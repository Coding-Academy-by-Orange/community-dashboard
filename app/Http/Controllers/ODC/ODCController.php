<?php

namespace App\Http\Controllers\ODC;

use App\ODC;
use App\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class ODCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::where('component', 'digitalcenter')
        ->where(function ($query) {
            $query->where('timeline', 'Public(component)')
                ->where(function ($subquery) {
                    $subquery->where(function ($subquery) {
                        $subquery->whereNotNull('publication_date')
                            ->where('publication_date', '<=', now());
                    })->orWhere(function ($subquery) {
                        $subquery->whereNull('publication_date')
                            ->whereNull('start_date')
                            ->whereNull('end_date');
                    });
                });
        })
        ->orWhere(function ($query) {
            $query->where('component', 'digitalcenter')
                ->where('timeline', 'Public(component)')
                ->whereNotNull('end_date')
                ->where('end_date', '>', now());
        })
        ->orderBy('start_date')
        ->orderBy('end_date')
        ->take(5)
        ->get();
        return view('public.digitalcenter.orangedigitalcenter', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public.digitalcenter.create');
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
            'email' => 'required|email|unique:digitalcenter_users,email',
            'mobile' => 'required|numeric|digits:10|regex:/^07[0-9]{8}$/|unique:digitalcenter_users,mobile',
            'birthdate' => 'required|date|before:today',
            'father_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'grandfather_name' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
            'residence' => 'required',
            'education' => 'required',
            'employment' => 'required',
            'center' => 'required',
            'obstacles' => 'required|min:1',
            'programming' => 'required|array|min:1',
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

            if ($errors->has('mobile')) {
                $mobileErrors = $errors->get('mobile');
                foreach ($mobileErrors as $error) {
                    $allErrors['mobile'] = $error;
                }
            }

            if ($errors->has('birthdate')) {
                $birthdateErrors = $errors->get('birthdate');
                foreach ($birthdateErrors as $error) {
                    $allErrors['birthdate'] = $error;
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
            if ($errors->has('center')) {
                $centerErrors = $errors->get('center');
                foreach ($centerErrors as $error) {
                    $allErrors['center'] = $error;
                }
            }
            if ($errors->has('programming')) {
                $programmingErrors = $errors->get('programming');
                foreach ($programmingErrors as $error) {
                    $allErrors['programming'] = $error;
                }
            }
            if ($errors->has('obstacles')) {
                $obstaclesErrors = $errors->get('obstacles');
                foreach ($obstaclesErrors as $error) {
                    $allErrors['obstacles'] = $error;
                }
            }
        }

        session()->forget('status');
        session()->forget('error');

        if ($request->input('obstacles') == 'Yes') {
            $validator = Validator::make($request->all(), [
                'type_of_obstacles' => 'required',
            ]);
            $errors = $validator->errors();
            if ($errors->has('type_of_obstacles')) {
                $type_of_obstaclesErrors = $errors->get('type_of_obstacles');
                foreach ($type_of_obstaclesErrors as $error) {
                    $allErrors['type_of_obstacles'] = $error;
                }
            }
        }

        if ($request->input('nationality') == 'Jordanian') {
            $validator = Validator::make($request->all(), [
                'national_id' => 'required|digits:10|unique:digitalcenter_users,national_id',
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
                'passport_number' => 'required|unique:digitalcenter_users,passport_number',
            ]);
            $errors = $validator->errors();
            if ($errors->has('passport_number')) {
                $passport_numberErrors = $errors->get('passport_number');
                foreach ($passport_numberErrors as $error) {
                    $allErrors['passport_number'] = $error;
                }
            }
        }


        if ($allErrors != []) {
            return redirect()->route('ODC.create')->withErrors($allErrors)->withInput();
        }

        try {
            $new_user = new ODC;

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
                if ($request->input('other_nationalty')) {
                    $new_user->other_nationalty = $request->input('other_nationalty');
                };
            };
            $new_user->birthdate = $request->input('birthdate');
            $new_user->mobile = $request->input('mobile');
            if ($request->input('whatsapp')) {
                $new_user->whatsapp = $request->input('whatsapp');
            };
            $new_user->residence = $request->input('residence');
            $new_user->education = $request->input('education');
            $new_user->employment = $request->input('employment');
            $new_user->center = $request->input('center');
            $new_user->programming = serialize($request->input('programming'));
            $new_user->obstacles = $request->input('obstacles');
            if ($request->input('obstacles') == 'Yes') {
                $new_user->type_of_obstacles = serialize($request->input('type_of_obstacles'));
            };
            if ($request->input('news')) {
                $new_user->news = $request->input('news');
            };

            $new_user->save();
            return redirect('/thanks');
        } catch (QueryException $e) {

            if ($e->errorInfo[1] === 1062) {

                $errorMessage = [];

                if ($request->input('nationality') == 'Jordanian') {
                    $exists = ODC::where('national_id', $request->input('national_id'))->exists();
                    if ($exists) {
                        array_push($errorMessage, 'الرقم الوطني المستخدم قد تم التسجيل به من قبل.');
                    }
                } else {
                    $exists = ODC::where('passport_number', $request->input('passport_number'))->exists();
                    if ($exists) {
                        array_push($errorMessage, 'رقم جواز السفر المستخدم قد تم التجسيل به من قبل.');
                    }
                };


                $exists = ODC::where('email', $request->input('email'))->exists();
                if ($exists) {
                    array_push($errorMessage, 'الايميل المستخدم قد تم التسجيل به من قبل.');
                }
                $exists = ODC::where('mobile', $request->input('mobile'))->exists();
                if ($exists) {
                    array_push($errorMessage, 'رقم الهاتف المستخدم قد تم التسجيل به من قبل.');
                }

                return redirect()->route('ODC.create')->withErrors($errorMessage)->withInput();
            } else {
                $errorMessage  = 'حدث خطأ في عملية التسجيل.';
                $request->session()->put('error', $errorMessage);
                return redirect()->route('ODC.create')->withInput();
            }
        }
    }


    public function filter(Request $request)
    {
        $users = ODC::query();

        if ($request->filled('nationality')) {
            $users->where('nationality', $request->nationality);
        }
        if ($request->filled('gender')) {
            $users->where('gender', $request->gender);
        }
        if ($request->filled('year')) {
            $currentYear = now()->year;
            $birthYear = $currentYear - $request->year;

            $users->where('age', $birthYear);
        }
        if ($request->filled('educational_level')) {
            $users->where('education', $request->educational_level);
        }

        $users->orderBy('first_name'); // Apply ordering after all filters

        $nationality = $request->filled('nationality') ? $request->nationality : "All";
        $gender = $request->filled('gender') ? $request->gender : "All";
        $year = $request->filled('year') ? $request->year : "All";
        $educational_level = $request->filled('educational_level') ? $request->educational_level : "All";

        return view('admin.user.read', [
            'users' => $users->get(), // Removed the unnecessary where clause
            'nationality' => $nationality,
            'gender' => $gender,
            'year' => $year,
            'education' => $educational_level,
        ]);
    }


    public function show($id)
    {
        $student = ODC::findOrFail($id);
        return view('admin.user.odc.show', compact('student'));
    }

    public function changeStatus(Request $request, $id)
    {
        $student = ODC::findOrFail($id);

        // Validate the request here if needed

        $newStatus = $request->input('new_status');
        $student->status = $newStatus;
        $student->save();

        return redirect()->route('admin.user.odc.show', $student->id)
            ->with('status', 'User status changed successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ODC  $oDC
     * @return \Illuminate\Http\Response
     */
    public function edit(ODC $oDC)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ODC  $oDC
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ODC $oDC)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ODC  $oDC
     * @return \Illuminate\Http\Response
     */
    public function destroy(ODC $oDC)
    {
        //
    }
}
