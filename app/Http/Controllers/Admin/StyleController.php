<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StyleRequest;
use App\Models\Admin\Style;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $styles = Style::paginate(25);
        return view('admin.styles.index', compact('styles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.styles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StyleRequest $request)
    {
        $data = $request->all();
        $style = Style::create($data);
        flash('Estilo Musical Criado com Sucesso!')->success();
	    return redirect()->route('styles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function show(Style $style)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $style = Style::find($id);
        return view('admin.styles.edit',compact('style'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function update(StyleRequest $request, $id)
    {
        $data = $request->all();
        $style = Style::find($id);
        $style ->update($data);
        flash('Estilo Musical atualizado com Sucesso!')->success();
        return redirect()->route('styles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $singer = Style::find($id);

        if(isset($singer)){
            $singer->delete();
        }

        flash('Estilo Musical Removido com Sucesso!')->success();
        return redirect()->route('styles.index');
    }
}
