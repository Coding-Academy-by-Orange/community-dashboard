<?php

namespace App\Http\Controllers;

use App\location;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::guard('admin')->user();
        $locations = location::where('component', $user->component)->get();
        return view('admin.user.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'governorate' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $location = new location([
            'name' => $request->input('name'),
            'governorate' => $request->input('governorate'),
            'component' => $user->component
        ]);
        $location->save();
        return redirect('/thanks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(location $location)
    {
        return view('admin.user.location.edit', [
            'location' => location::findOrFail($location->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, location $location)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'governorate' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $location->update([
            'name' => $request->input('name'),
            'governorate' => $request->input('governorate'),
        ]);
        return redirect('/thanks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(location $location)
    {
        location::destroy($location->id);
        return redirect('/location');
    }

    public function getLocation(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $governorate = $request->input('governorate');
        $locations = Location::where('governorate', $governorate)->where('component', $user->component)->get(['id', 'name']);
        return response()->json(['locations' => $locations]);
    }
}
