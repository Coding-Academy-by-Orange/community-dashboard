<?php

namespace App\Http\Controllers\Activity;

use App\activity_register;
use App\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ActivityRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($activity_id)
    {
        $activity = Activity::find($activity_id);

        if (!$activity) {
            abort(404);
        }
        $participants = $activity->activity_register;

        return view('admin.activity.register.index', compact('participants', 'activity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($activity_id)
    {
        $user = Auth::user();
        if ($user) {
            return view('admin.activity.register.create', compact('activity_id'));
        } else {
            return view('public.activity.register', compact('activity_id'));
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        if ($user) {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'mobile' => 'required|numeric|digits:10|regex:/^07[0-9]{8}$/',
                'birthdate' => 'required|date',
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'residence' => 'required',
                'admin_id' => 'required',
                'component' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $new_user = new activity_register();

            $new_user->activity_id = $request->input('activity_id');
            $new_user->admin_id = $request->input('admin_id');
            $new_user->first_name = $request->input('first_name');
            $new_user->last_name = $request->input('last_name');
            $new_user->gender = $request->input('gender');
            $new_user->email = $request->input('email');
            $new_user->birthdate = $request->input('birthdate');
            $new_user->mobile = $request->input('mobile');
            $new_user->residence = $request->input('residence');
            $new_user->component = $request->input('component');

            $new_user->save();
            return redirect('/thanks');
        } else {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'mobile' => 'required|numeric|digits:10|regex:/^07[0-9]{8}$/',
                'birthdate' => 'required|date',
                'father_name' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'grandfather_name' => 'required',
                'nationality' => 'required',
                'gender' => 'required',
                'residence' => 'required',
                'education' => 'required',
            ]);

            if ($request->input('nationality') == 'Jordanian') {
                $validator->addRules([
                    'national_id' => 'required|digits:10',
                ]);
            } else {
                $validator->addRules([
                    'passport_number' => 'required',
                ]);
            }

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $new_user = new activity_register();

            $new_user->activity_id = $request->input('activity_id');
            $new_user->first_name = $request->input('first_name');
            $new_user->father_name = $request->input('father_name');
            $new_user->grandfather_name = $request->input('grandfather_name');
            $new_user->last_name = $request->input('last_name');
            $new_user->nationality = $request->input('nationality');
            $new_user->gender = $request->input('gender');
            $new_user->email = $request->input('email');

            if ($request->input('nationality') == 'Jordanian') {
                $new_user->national_id = $request->input('national_id');
            } else {
                $new_user->passport_number = $request->input('passport_number');
            }

            $new_user->birthdate = $request->input('birthdate');
            $new_user->mobile = $request->input('mobile');
            $new_user->residence = $request->input('residence');
            $new_user->education = $request->input('education');
            $new_user->employment = $request->input('employment');

            $new_user->save();

            return redirect('/thanks');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\activity_register  $activity_register
     * @return \Illuminate\Http\Response
     */
    public function show(activity_register $activity_register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\activity_register  $activity_register
     * @return \Illuminate\Http\Response
     */
    public function edit(activity_register $activity_register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\activity_register  $activity_register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, activity_register $activity_register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\activity_register  $activity_register
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activityRegister = activity_register::find($id);

        // Check if the record exists
        if (!$activityRegister) {
            abort(404); // Or you can handle it differently, e.g., redirect back with an error message
        }

        // Delete the activity_register record
        $activityRegister->delete();

        // Redirect back or to a different page after deletion
        return redirect()->back()->with('success', 'Activity registration deleted successfully');
    }
}
