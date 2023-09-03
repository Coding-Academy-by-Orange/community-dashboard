<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.activity.create');
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

        // Validate the request

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'activity_type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'required|string',
            'location' => 'required|string',
            'cohort' => 'nullable|string',
            'timeline' => 'required|string',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            // Redirect back with errors and input
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle image upload
        if ($request->hasFile('images')) {
            $imagePaths = []; // Create an array to store the new image paths

            foreach ($request->file('images') as $image) {
                // Generate a unique filename for each image
                $imageName = $request->input('name') . '_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Store the image with the generated name in the specified directory
                $image->storeAs('admin-assets/images/activity', $imageName, 'public');

                // Add the image path to the array
                $imagePaths[] = 'admin-assets/images/activity/' . $imageName;
            }
        } else {
            $imagePaths = null; // No images provided
        }

        // Create and save the activity
        $admin = Auth::guard('admin')->user();

        $activity = new Activity([
            'activity_name' => $request->input('name'),
            'activity_type' => $request->input('activity_type'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'cohort' => $request->input('cohort'),
            'timeline' => $request->input('timeline'),
            'image' => json_encode($imagePaths), // Store image paths as JSON
            'video' => $request->input('video'),
            'component' => $admin->component,
            'admin_id' => $admin->id,
        ]);

        $activity->save();
        return redirect('/thanks');
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
