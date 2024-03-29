<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\SubscriptionRequest;
use App\Models\Admin\Style;
use App\Models\Admin\Subscription;
use Illuminate\Http\Request;

class SubscriptionPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $styles = Style::all();
        return view('subscritionpage',compact("styles"));
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
    public function store(SubscriptionRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('video') && $request->file('video')->isValid()){
             $file = $request->file('video');
            $data['video'] = $file->store('video','public');
        }
        $subscription = Subscription::create($data);
        $subscription->styles()->sync($data['styles']);
        flash('Inscrição Realizada com Sucesso!')->success();
	    return redirect()->route('home');
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
