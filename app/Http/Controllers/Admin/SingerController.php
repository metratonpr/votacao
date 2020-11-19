<?php

namespace App\Http\Controllers\Admin;

use App\Models\Singer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class SingerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $singers = Singer::paginate(25);
        return view('admin.singers.index',compact('singers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.singers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('image') && $request->file('image')->isValid()){
             $file = $request->file('image');
            $data['image'] = $file->store('image','public');
        }
        $singer = Singer::create($data);
        flash('Artista Criado com Sucesso!')->success();
	    return redirect()->route('singers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function show(Singer $singer)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $singer = Singer::find($id);
        return view('admin.singers.edit',compact(['singer']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->all();
        $singer = Singer::find($id);

        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($singer->image)){
                Storage::disk('public')->delete($singer->image);
            }
            $file = $request->file('image');
            $data['image'] = $file->store('image','public');
        }

        $singer ->update($data);
        flash('Artista Atualizado com Sucesso!')->success();
        return redirect()->route('singers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $singer = Singer::find($id);

        if(isset($singer)){
            $photoName = $singer->image;
            if(Storage::disk('public')->exists($photoName)){
                Storage::disk('public')->delete($photoName);
            }
            $singer->delete();
        }

        flash('Artista Removido com Sucesso!')->success();
        return redirect()->route('singers.index');
    }
}
