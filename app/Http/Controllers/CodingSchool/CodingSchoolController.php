<?php

namespace App\Http\Controllers\CodingSchool;

use App\codingSchool;
use App\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CodingSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::where('component', 'codingschool')
            ->whereIn('timeline', ["public", "component"])
            ->where(function ($query) {
                $query->where(function ($subquery) {
                    $subquery->whereNotNull('publication_date')
                        ->where('publication_date', '<=', now());
                })->orWhere(function ($subquery) {
                    $subquery->whereNull('publication_date')
                        ->whereNull('start_date')
                        ->whereNull('end_date');
                });
            })
            ->orWhere(function ($query) {
                $query->whereNotNull('end_date')
                    ->where('end_date', '>', now());
            })
            ->orderBy('start_date')
            ->orderBy('end_date')
            ->take(5)
            ->get();
        return view('public.codingschool.codingschool', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public.codingschool.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:coding_school,email',
            'mobile' => 'required|numeric|digits:10|regex:/^07[0-9]{8}$/|unique:coding_school,mobile',
            'birthdate' => 'required|date|before:today',
            'father_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'grandfather_name' => 'required',
            'gender' => 'required',
            'education' => 'required',
            'major_study' => 'required'
        ]);

        $new_user = new codingSchool;

        $new_user->first_name = $request->input('first_name');
        $new_user->father_name = $request->input('father_name');
        $new_user->grandfather_name = $request->input('grandfather_name');
        $new_user->last_name = $request->input('last_name');
        $new_user->email = $request->input('email');
        $new_user->mobile = $request->input('mobile');
        $new_user->birthdate = $request->input('birthdate');
        $new_user->gender = $request->input('gender');
        $new_user->education = $request->input('education');
        $new_user->major_study = $request->input('major_study');
        $new_user->save();
        return redirect('/thanks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\codingSchool  $codingSchool
     * @return \Illuminate\Http\Response
     */
    public function show(codingSchool $codingSchool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\codingSchool  $codingSchool
     * @return \Illuminate\Http\Response
     */
    public function edit(codingSchool $codingSchool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\codingSchool  $codingSchool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, codingSchool $codingSchool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\codingSchool  $codingSchool
     * @return \Illuminate\Http\Response
     */
    public function destroy(codingSchool $codingSchool)
    {
        //
    }
}
