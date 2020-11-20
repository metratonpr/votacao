<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class Sandbox extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $clientIp = $request->ip();

        $token = $request->cookie('XSRF-TOKEN');

        $ips = Vote::where('ip', $clientIp)->count();

        $elections = Election::addSelect([
            'ip_already_voted' => function ($query) use ($token) {
                $query->selectRaw('1')
                    ->from('votes')
                    ->where('votes.computerName', $token)
                    ->whereColumn('votes.election_id', 'elections.id')
                    ->limit(1);
            },
            'ip_votes' => function ($query) use ($clientIp) {
                 $query->selectRaw('1')
                ->from('votes')
                ->count('votes.ip', $clientIp)
                ->whereColumn('votes.election_id', 'elections.id')
                ->limit(1);
                
            }

        ])->where('view', 1)->get();


        dd($elections);

        return view('home', compact(['elections',$ips]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
