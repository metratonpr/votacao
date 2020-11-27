<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SubscriptionRequest;
use App\Models\Admin\Style;
use App\Models\Admin\Subscription;
use Illuminate\Routing\Controller;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscription::paginate(25);
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $styles = Style::all();
        return view('admin.subscriptions.create');
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
        flash('Inscrição Realizada com Sucesso!')->success();
	    return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $singer = Subscription::find($id);
        $styles = Style::all();
        return view('admin.singers.edit',compact(['singer','styles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(SubscriptionRequest $request, $id)
    {
        $data = $request->all();
        if($request->hasFile('video') && $request->file('video')->isValid()){
             $file = $request->file('video');
             $data['video'] = $file->store('video','public');
        }
        $subscription = Subscription::create($data);
        flash('Inscrição Realizada com Sucesso!')->success();
	    return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
