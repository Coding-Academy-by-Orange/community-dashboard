<?php

namespace App\Http\Controllers;

use App\FablabUsers;
use App\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class FablabUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::where('timeline',"public")
        ->where('component', "fablab")
        ->where('end_date', '>', now())
        ->where('start_date', '<=', now())
        ->orderBy('start_date')
        ->orderBy('end_date')
        ->take(5)
        ->get();
        return view('public.fablab.fablabregistration', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public.fablab.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $allErrors = [];

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:fablab_users,email',
            'mobile' => 'required|numeric|digits:10|regex:/^07[0-9]{8}$/|unique:fablab_users,mobile',
            'whatsapp' => 'required|numeric|digits:10|regex:/^07/|unique:fablab_users,whatsapp',
            'age' => 'required|numeric|digits_between:1,2|min:18',
            'father_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'grandfather_name' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
            'residence' => 'required',
            'education' => 'required',
            'employment' => 'required',
            'affiliation' => 'required',
        ]);

        if ($validator->fails()) {
            // Validation failed, handle the errors
            $errors = $validator->errors();

            if ($errors->has('email')) {
                $emailErrors = $errors->get('email');
                foreach ($emailErrors as $error) {
                    $allErrors['email'] = $error;
                }
            }

            if ($errors->has('whatsapp')) {
                $nationalIdErrors = $errors->get('whatsapp');
                foreach ($nationalIdErrors as $error) {
                    $allErrors['whatsapp'] = $error;
                }
            }

            if ($errors->has('mobile')) {
                $mobileErrors = $errors->get('mobile');
                foreach ($mobileErrors as $error) {
                    $allErrors['mobile'] = $error;
                }
            }

            if ($errors->has('age')) {
                $ageErrors = $errors->get('age');
                foreach ($ageErrors as $error) {
                    $allErrors['age'] = $error;
                }
            }




            if ($errors->has('father_name')) {
                $father_nameErrors = $errors->get('father_name');
                foreach ($father_nameErrors as $error) {
                    $allErrors['father_name'] = $error;
                }
            }
            if ($errors->has('first_name')) {
                $first_nameErrors = $errors->get('first_name');
                foreach ($first_nameErrors as $error) {
                    $allErrors['first_name'] = $error;
                }
            }
            if ($errors->has('last_name')) {
                $last_nameErrors = $errors->get('last_name');
                foreach ($last_nameErrors as $error) {
                    $allErrors['last_name'] = $error;
                }
            }
            if ($errors->has('grandfather_name')) {
                $grandfather_nameErrors = $errors->get('grandfather_name');
                foreach ($grandfather_nameErrors as $error) {
                    $allErrors['grandfather_name'] = $error;
                }
            }
            if ($errors->has('father_name')) {
                $father_nameErrors = $errors->get('father_name');
                foreach ($father_nameErrors as $error) {
                    $allErrors['father_name'] = $error;
                }
            }



            if ($errors->has('nationality')) {
                $nationalityErrors = $errors->get('nationality');
                foreach ($nationalityErrors as $error) {
                    $allErrors['nationality'] = $error;
                }
            }
            if ($errors->has('gender')) {
                $genderErrors = $errors->get('gender');
                foreach ($genderErrors as $error) {
                    $allErrors['gender'] = $error;
                }
            }
            if ($errors->has('residence')) {
                $residenceErrors = $errors->get('residence');
                foreach ($residenceErrors as $error) {
                    $allErrors['residence'] = $error;
                }
            }
            if ($errors->has('education')) {
                $educationErrors = $errors->get('education');
                foreach ($educationErrors as $error) {
                    $allErrors['education'] = $error;
                }
            }
            if ($errors->has('employment')) {
                $employmentErrors = $errors->get('employment');
                foreach ($employmentErrors as $error) {
                    $allErrors['employment'] = $error;
                }
            }
            if ($errors->has('affiliation')) {
                $affiliationErrors = $errors->get('affiliation');
                foreach ($affiliationErrors as $error) {
                    $allErrors['affiliation'] = $error;
                }
            }

        }

        session()->forget('status');
        session()->forget('error');



        if($request->input('nationality') == 'Jordanian'){
            $validator = Validator::make($request->all(), [
                'national_id' => 'required|digits:10|unique:fablab_users,national_id',
            ]);
            $errors = $validator->errors();
            if ($errors->has('national_id')) {
                $national_idErrors = $errors->get('national_id');
                foreach ($national_idErrors as $error) {
                    $allErrors['national_id'] = $error;
                }
            }
        } else {
            $validator = Validator::make($request->all(), [
                'passport_number' => 'required|unique:fablab_users,passport_number',
            ]);
            $errors = $validator->errors();
            if ($errors->has('passport_number')) {
                $passport_numberErrors = $errors->get('passport_number');
                foreach ($passport_numberErrors as $error) {
                    $allErrors['passport_number'] = $error;
                }
            }
        }


        if($request->input('education') == 'Undergraduate' || $request->input('education') == 'Graduate' ){
            $validator = Validator::make($request->all(), [
                'major_study' => 'required',
            ]);
            $errors = $validator->errors();
            if ($errors->has('major_study')) {
                $major_studyErrors = $errors->get('major_study');
                foreach ($major_studyErrors as $error) {
                    $allErrors['major_study'] = $error;
                }
            }
        }

        if ($allErrors != []){
            return redirect('/fablab-registration')->withErrors($allErrors)->withInput();
        }

        try {
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
            $new_user->whatsapp = $request->input('whatsapp');
            $new_user->residence = $request->input('residence');
            $new_user->education = $request->input('education');
            $new_user->major_study = $request->input('major_study');
            $new_user->employment = $request->input('employment');
            $new_user->program = $request->input('program');
           // $new_user->technology_type = $request->input('technology_type');
            $new_user->idea_description = $request->input('idea_description');

            $new_user->save();

            return redirect('/thanks');

        } catch (QueryException $e) {
            if ($e->errorInfo[1] === 1062) {

                $errorMessage = [];
                dd($e->errorInfo);
                if($request->input('nationality') == 'Jordanian'){
                    $exists = FablabUsers::where('national_id',$request->input('national_id'))->exists();
                    if ($exists) {
                        array_push($errorMessage , 'The national id is already registered.');
                    }
                } else {
                    $exists = FablabUsers::where('passport_number',$request->input('passport_number'))->exists();
                    if ($exists) {
                        array_push($errorMessage , 'The passport number is already registered.');
                    }
                };

                $exists = FablabUsers::where('email',$request->input('email'))->exists();
                if ($exists) {
                    array_push($errorMessage , 'The email address is already registered.');
                }
                $exists = FablabUsers::where('mobile',$request->input('mobile'))->exists();
                if ($exists) {
                    array_push($errorMessage , 'The mobile is already registered.');
                }
                $exists = FablabUsers::where('whatsapp',$request->input('whatsapp'))->exists();
                if ($exists) {
                    array_push($errorMessage , 'The whatsapp is already registered.');
                }

                return redirect('/fablab-registration')->withErrors($errorMessage)->withInput();

            }  else {
                $errorMessage  = 'An error occurred during registration.';
                $request->session()->put('error', $errorMessage);
                return redirect('/fablab-registration')->withInput();
            }
        }
    }
    public function filter(Request $request)
    {
        $users = FablabUsers::query();
        if ($request->filled('nationality')) {
            $users->where('nationality', $request->nationality)->orderBy('first_name');
        }
        if ($request->filled('gender')) {
            $users->where('gender', $request->gender)->orderBy('first_name');
        }
        if ($request->filled('year')) {
            $users->whereYear('birthday', $request->year)->orderBy('first_name');
        }
        if ($request->filled('educational_level')) {
            $users->where('education', $request->educational_level)->orderBy('first_name');
        }


        if ($request->nationality != "") {
            $nationality = $request->nationality;
        } else {
            $nationality = "All";
        }
        if ($request->gender != "") {
            $gender = $request->gender;
        } else {
            $gender = "All";
        }
        if ($request->year != "") {
            $year = $request->year;
        } else {
            $year = "All";
        }
        if ($request->educational_level != "") {
            $educational_level = $request->educational_level;
        } else {
            $educational_level = "All";
        }
       
        return view('admin.user.read', [
            'users' => $users->where('nationality', "!=", null)->get(),
            'nationality' => $nationality,
            'gender' => $gender,
            'year' => $year,
            'education' => $educational_level,
        ]);
    }

    public function show($id)
    {
        $student = FablabUsers::findOrFail($id);
        return view('admin.user.fablab.show', compact('student'));
    }

    public function changeStatus(Request $request, $id)
    {
        $student = FablabUsers::findOrFail($id);

        // Validate the request here if needed

        $newStatus = $request->input('new_status');
        $student->status = $newStatus;
        $student->save();

        return redirect()->route('admin.user.fablab.show', $student->id)
            ->with('status', 'User status changed successfully.');
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
    public function destroy($id)
    {
        FablabUsers::destroy($id);
        return redirect('/admin/users');
    }
}
