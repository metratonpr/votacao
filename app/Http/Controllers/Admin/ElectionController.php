<?php

namespace App\Http\Controllers\Admin;

use App\Models\Election;
use App\Models\Singer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ElectionRequest;
use App\Models\Vote;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $elections = Election::paginate(25);;
        return view('admin.elections.index',compact('elections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $singers = Singer::all(['id','fullName']);
        return view('admin.elections.create',compact('singers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ElectionRequest $request)
    {
        //
        $data = $request->all();
        dd($data);

        if($request->hasFile('image') && $request->file('image')->isValid()){
             $file = $request->file('image');
            $data['image'] = $file->store('image','public');
        }

        if(isset($data['isOpen'])){
            $data['isOpen'] = true;
        } else{
            $data['isOpen'] = false;
        }

        if(isset($data['view'])){
            $data['view'] = true;
        } else{
            $data['view'] = false;
        }

        if(!isset($data['votes'])){
            $data['votes'] = 0;
        }

        $election = Election::create($data);
        $election->singers()->sync($data['singers']);

        flash('Votação criada com Sucesso!')->success();
	    return redirect()->route('elections.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $election = Election::find($id);

        $singers = $election->singers;

        $votes = [];

        $maior = 0;

        $vencedor = null;

        foreach($singers as $singer){
            $vote = Vote::where('singer_id',$singer->id)->count();
            $ar = [$singer->fullName, $vote];
            array_push($votes,$ar);
            if($vote > $maior){
                $maior = $vote;
                $vencedor = $singer;
            }
        }
        return view('admin.elections.result',compact(['votes','election','vencedor']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $singers = Singer::all(['id','fullName']);
        $election = Election::find($id);
        return view('admin.elections.edit',compact(['election','singers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function update(ElectionRequest $request, $id)
    {
        $data = $request->all();
        $election = Election::find($id);

        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($election->image)){
                Storage::disk('public')->delete($election->image);
            }
            $file = $request->file('image');
            $data['image'] = $file->store('image','public');
        }

        if(isset($data['isOpen'])){
            $data['isOpen'] = true;
        } else{
            $data['isOpen'] = false;
        }

        if(isset($data['view'])){
            $data['view'] = true;
        } else{
            $data['view'] = false;
        }

        if(!isset($data['votes'])){
            $data['votes'] = 0;
        }
        $election ->update($data);
        $election->singers()->sync($data['singers']);
        flash('Votação Atualizada com Sucesso!')->success();
        return redirect()->route('elections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $election = Election::find($id);

        if(isset($election)){
            $photoName = $election->image;
            if(Storage::disk('public')->exists($photoName)){
                Storage::disk('public')->delete($photoName);
            }
            $election->delete();
        }

        flash('Votação Removida com Sucesso!')->success();
        return redirect()->route('elections.index');
    }

}
