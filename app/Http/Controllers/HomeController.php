<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Singer;
use App\Models\Vote;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use phpDocumentor\Reflection\PseudoTypes\False_;
use phpDocumentor\Reflection\PseudoTypes\True_;

use function PHPSTORM_META\type;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $clientIp = $request->ip();

        $elections = Election::addSelect([
           'ip_already_voted' => function($query) use ($clientIp) {
               $query->selectRaw('1')
                 ->from('votes')
                 ->where('votes.ip', $clientIp)
                 ->whereColumn('votes.election_id', 'elections.id')
                 ->limit(1);
           }
        ])->where('view',1)->get();

        return view('home',compact('elections'));
    }

    public function votar(Request $request) {

        $data = $request->all();

        $election = Election::find($data['election']);

        $singer = Singer::find($data['singer']);

        // Se estiver no form eu posso editar o IP no HTML e votar quantas vezes eu quiser
        $clientIp = $request->ip();

        // Validação se já votou
        $alreadyVoted = Vote::where('election_id', $election->id)->where('ip', $clientIp)->exists();

        if(isset($election) && isset($singer) && $election->isOpen && !$alreadyVoted){
            $electionName = $election->name;
            $electionId = $election->id;
            $singerId = $singer->id;
            $data['computerName'] = $data['_token'];

            $now = new DateTime();
            $now = $now->getTimestamp();

            $inicio = strtotime($election->starts_in);

            $fim = strtotime($election->ends_in);

            $dat = [$inicio, $fim, $now];

            $vote = Vote::where([['computerName','=',$data['computerName']],["election_id",'=',$electionId]])->first();

            $ips = Vote::where([['ip','=',$clientIp],["election_id",'=',$electionId]])->count();

            if(!isset($vote) && $now >= $inicio && $now <= $fim && $ips <= 3){
                $vote = new Vote();
                $vote->election_id = $electionId;
                $vote->singer_id = $singerId;
                $vote->ip = $clientIp;
                $vote->computerName = $data['computerName'];
                $vote->save();


                $votesTotal = Vote::where("election_id",'=',$electionId)->count();
                $election->votes = $votesTotal;
                $election->save();


            }
        }

        return redirect()->route('obrigado');



    }

    public function possuiCokie($electionName){
        $cookie = Cookie::get($electionName);

        dd($cookie);

        if(isset($cookie)){
            return True;
        } else{
            return False;
        }
    }

    public function obrigado(){
        return view('admin.votes.obrigado');
    }
}
