<?php

namespace App\Http\Controllers;

use App\FablabUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FablabUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('public.fablabregistration');
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
        $new_user = new FablabUsers;

        $new_user->first_name = $request->input('first_name');
        $new_user->father_name = $request->input('father_name');
        $new_user->grandfather_name = $request->input('grandfather_name');
        $new_user->last_name = $request->input('last_name');
        $new_user->nationality = $request->input('nationality');
        $new_user->affiliation = $request->input('affiliation');
        $new_user->gender = $request->input('gender');
        $new_user->email = $request->input('email');
        if($request->input('nationality') == 'Jordanian'){
            $new_user->national_id = $request->input('national_id');
        } else {
            $new_user->passport_number = $request->input('passport_number');
        };
        $new_user->age = $request->input('age');
        $new_user->mobile = $request->input('mobile');
        $new_user->whatsaap = $request->input('whatsaap');
        $new_user->residence = $request->input('residence');
        $new_user->education = $request->input('education');
        $new_user->major_study = $request->input('major_study');
        $new_user->employment = $request->input('employment');
        $new_user->program = $request->input('program');
        $new_user->technology_type = $request->input('technology_type');
        $new_user->idea_description = $request->input('idea_description');

        $new_user->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FablabUsers  $fablabUsers
     * @return \Illuminate\Http\Response
     */
    public function show(FablabUsers $fablabUsers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FablabUsers  $fablabUsers
     * @return \Illuminate\Http\Response
     */
    public function edit(FablabUsers $fablabUsers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FablabUsers  $fablabUsers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FablabUsers $fablabUsers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FablabUsers  $fablabUsers
     * @return \Illuminate\Http\Response
     */
    public function destroy(FablabUsers $fablabUsers)
    {
        //
    }
}
