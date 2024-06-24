<?php

namespace App\Http\Controllers;

use App\ComponentRegistration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComponentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        //
        $component = Auth::user()->component;
        $registrations = ComponentRegistration::where('component', $component)->get();
        return view('admin.registration.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.registration.create');
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
        $component = Auth::user()->component;
        $request->request->add(['component' => $component]);
        ComponentRegistration::create($request->all());
        return redirect()->route('registration.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ComponentRegistration  $componentRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(ComponentRegistration $componentRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ComponentRegistration  $componentRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit($componentRegistration)
    {
        //
        $componentRegistration = ComponentRegistration::find($componentRegistration);
        return view('admin.registration.edit', compact('componentRegistration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ComponentRegistration  $componentRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $componentRegistration)
    {
        //
        $componentRegistration = ComponentRegistration::find($componentRegistration);
        //dd($componentRegistration);
        $componentRegistration->update($request->all());
        return redirect()->route('registration.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ComponentRegistration  $componentRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy($componentRegistration)
    {
        //
        $registration = ComponentRegistration::find($componentRegistration);
        $registration->delete();
        return redirect()->route('registration.index');
    }
}
