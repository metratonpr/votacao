<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SubscriptionEditRequest;
use App\Http\Requests\Admin\SubscriptionRequest;
use App\Models\Admin\Style;
use App\Models\Admin\Subscription;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.subscriptions.create',compact(['styles']));
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
	    return redirect()->route('subscriptions.index');
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
        $subscription = Subscription::find($id);
        $styles = Style::all();
        return view('admin.subscriptions.edit',compact(['subscription','styles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(SubscriptionEditRequest $request, $id)
    {
        $data = $request->all();
        $subscription = Subscription::find($id);

        if ($request->hasFile('video')) {
            if (Storage::disk('public')->exists($subscription->video)) {
                Storage::disk('public')->delete($subscription->video);
            }
            $file = $request->file('video');
            $data['video'] = $file->store('video', 'public');
        }
        $subscription->update($data);
        $subscription->styles()->sync($data['styles']);
        flash('Inscrição Atualizada com Sucesso!')->success();
        return redirect()->route('subscriptions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscription = subscription::find($id);

        if (isset($subscription)) {
            $video = $subscription->video;
            if (Storage::disk('public')->exists($video)) {
                Storage::disk('public')->delete($video);
            }
            $subscription->delete();
        }

        flash('Inscrição Removida com Sucesso com Sucesso!')->success();
        return redirect()->route('subscriptions.index');
    }
}
