<?php

namespace App\Http\Controllers;

use App\Activity;
use App\InnovationHub;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InnovationHubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Activity::where('component', 'innovation-hub')->where('start_date', '>=', now())->get();
        //dd($events);
        return view('public.innovation-hub.landing-page', compact('events'));
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
    public function storeBookTour(Request $request)
    {
        //

        return view('public.innovation-hub.thanks-success');
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'age' => 'required|integer|min:18|max:80',
            'background' => 'required|string',
            'business' => 'required|string',
            'disability' => 'required|in:yes,what,no,na',
            'topic' => 'required|string',
            'personna' => 'required|string',
            'entityName' => 'nullable|string',
            'tourDate' => 'required|date',
            'visitorsNumbers' => 'required|integer|min:1',
            'message' => 'required|string',
        ]);

        InnovationHub::create($data);

        return view('innovation-hub.thanks-success');


    }

    public function storeWorkshop(Request $request)
    {
        //

        return view('public.innovation-hub.thanks-success');
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:255',
        ]);

        InnovationHub::create($data);

        return view('innovation-hub.thanks-success');
    }

    public function storeProgram(Request $request)
    {
        //

        return view('public.innovation-hub.thanks-success');
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:255',
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\InnovationHub  $innovationHub
     * @return \Illuminate\Http\Response
     */
    public function show(InnovationHub $innovationHub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InnovationHub  $innovationHub
     * @return \Illuminate\Http\Response
     */
    public function edit(InnovationHub $innovationHub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InnovationHub  $innovationHub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InnovationHub $innovationHub)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InnovationHub  $innovationHub
     * @return \Illuminate\Http\Response
     */
    public function destroy(InnovationHub $innovationHub)
    {
        //
    }
}
