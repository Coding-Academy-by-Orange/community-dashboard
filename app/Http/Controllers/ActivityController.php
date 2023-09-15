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
        $user = Auth::user();
        if ($user) {
            if ($user->is_super == '1') {
                // Admin can see all activities
                $activities = Activity::whereIn('component', $user->component)->get();
            } else {
                // Regular user, filter by component and timeline
                $activities = Activity::where(function ($query) use ($user) {
                    $query->where('component', $user->component)
                        ->orWhere(function ($query) use ($user) {
                            $query->where('component', $user->component)
                                ->where('admin_id', $user->id);
                        });
                })
                    ->whereIn('timeline', ['private', 'both'])
                    ->where('end_date', '>', now())
                    ->orderBy('start_date')
                    ->orderBy('end_date')
                    ->get();
            }
            return view('admin.activity.index', compact('activities'));
        } else {
            $activities = Activity::whereIn('timeline', ['public', 'both'])->orderBy('start_date')
                ->orderBy('end_date')
                ->get();
            return view('public.landingpage', compact('activities'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.activity.create');
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

        if ($request->hasFile('images')) {
            $imagePaths = []; // Create an array to store the new image paths

            foreach ($request->file('images') as $image) {
                $imageName = $request->input('name') . '_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Store the image with the generated name in the specified directory
                $imagePath = 'admin-assets/images/activity/' . $imageName;
                $image->storeAs('public', $imagePath);

                // Add the image path to the array
                $imagePaths[] = $imagePath;
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
            'image' => json_encode($imagePaths),
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
        $user = Auth::user();
        if ($user) {
            return view('admin.activity.show', [
                'activity' => Activity::findOrFail($id)
            ]);
        } else {
            
            return view('public.activity.show', [
                'activity' => Activity::findOrFail($id)
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.activity.edit', [
            'activity' => Activity::findOrFail($id)
        ]);
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
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            // Redirect back with errors and input
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the activity to update
        $activity = Activity::findOrFail($id);

        // Handle image upload only if new images are provided
        if ($request->hasFile('images')) {
            $imagePaths = []; // Create an array to store the new image paths

            foreach ($request->file('images') as $image) {
                $imageName = $request->input('name') . '_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Store the image with the generated name in the specified directory
                $imagePath = 'admin-assets/images/activity/' . $imageName;
                $image->storeAs('public', $imagePath);

                // Add the image path to the array
                $imagePaths[] = $imagePath;
            }

            // Update the activity with new images
            $activity->update([
                'activity_name' => $request->input('name'),
                'activity_type' => $request->input('activity_type'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'description' => $request->input('description'),
                'location' => $request->input('location'),
                'cohort' => $request->input('cohort'),
                'timeline' => $request->input('timeline'),
                'image' => json_encode($imagePaths),
                'video' => $request->input('video'),
            ]);
        } else {
            // Update the activity without changing the images
            $activity->update([
                'activity_name' => $request->input('name'),
                'activity_type' => $request->input('activity_type'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'description' => $request->input('description'),
                'location' => $request->input('location'),
                'cohort' => $request->input('cohort'),
                'timeline' => $request->input('timeline'),
                'video' => $request->input('video'),
            ]);
        }

        // Redirect to the activity show page or any other page you prefer
        return redirect()->route('activity.show', $activity->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the activity by ID
        $activity = Activity::findOrFail($id);

        // Check if the authenticated user has permission to delete this activity
        if (Auth::id() === $activity->admin_id || Auth::user()->is_super == 1) {
            // Delete the activity
            $activity->delete();

            // Redirect back with a success message
            return redirect()->route('activity.index')->with('success', 'Activity deleted successfully.');
        } else {
            // If the user doesn't have permission, show an error message or redirect as needed.
            return redirect()->route('activity.index')->with('error', 'You do not have permission to delete this activity.');
        }
    }
}
