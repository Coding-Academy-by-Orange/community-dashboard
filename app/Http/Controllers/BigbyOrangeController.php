<?php

namespace App\Http\Controllers;

use App\BigbyOrange;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class BigbyOrangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('public.bigbyorangeusers.bigbyorange')->withInput(['step' => 1]);
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
        // Handle form submission logic for each step
        // You can access form data using $request->input('field_name')
        // Redirect to the next step or process the final step

        // Example:
        if ($request->input('step') == 1) {

            // dd('step 1');
            // Process step 1 and redirect to step 2
            $allErrors = [];

            $evaluation_purposes = $request->input('evaluation_purposes');

            $validator = Validator::make($request->all(), [
                'evaluation_purposes' => 'required',
            ]);
            $errors = $validator->errors();

            if ( ($errors->has('evaluation_purposes')) || ($evaluation_purposes == 'No') || ($evaluation_purposes == 'no')) {
                array_push($allErrors , 'You should choose "Yes" to complete the form');
                session()->put('step1', $allErrors);
            } else {
                session()->forget('step1'); // Clear the session if there are no errors
            }

            if ($allErrors != []){
                return redirect()->route('BigByOrange-registration.index')->withErrors($allErrors)->withInput();
            } else {
                Session::put('form_step1', $request->all());
                return redirect()->route('BigByOrange-registration.index')->withInput(['step' => 2]);
            }

        }
        elseif ($request->input('step') == 2) {
            // Process step 2 and redirect to step 3

            // dd('step 2');

            $allErrors = [];

            $validator = Validator::make($request->all(), [
                'father_name' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'grandfather_name' => 'required',

                'linkedin_profile' => 'required|url',
                'birthday' => 'required|date|before:today',
                'gender' => 'required',
                'nationality' => 'required',

                'email' => 'required|email|unique:bigbyorange_users,email',
                'mobile' => 'required|numeric|digits:10|regex:/^07/|unique:bigbyorange_users,mobile',
                'residence' => 'required',
                'education' => 'required',

                'employment' => 'required',
                'person_with_disability' => 'required',
                'Male_Co_Founders' => 'required',
                'Female_Co_Founders' => 'required',

                'Position' => 'required',
                'ProvideOfPosition' => 'required|url',
            ],[
                'birthday.before' => 'The date must not be in the future.',
            ]);

            if ($validator->fails()) {

                // Validation failed, handle the errors
                $errors = $validator->errors();

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

                if ($errors->has('Male_Co_Founders')) {
                    $Male_Co_FoundersErrors = $errors->get('Male_Co_Founders');
                    foreach ($Male_Co_FoundersErrors as $error) {
                        $allErrors['Male_Co_Founders'] = $error;
                    }
                }

                if ($errors->has('Female_Co_Founders')) {
                    $Female_Co_FoundersErrors = $errors->get('Female_Co_Founders');
                    foreach ($Female_Co_FoundersErrors as $error) {
                        $allErrors['Female_Co_Founders'] = $error;
                    }
                }

                if ($errors->has('birthday')) {
                    $birthdayErrors = $errors->get('birthday');
                    foreach ($birthdayErrors as $error) {
                        $allErrors['birthday'] = $error;
                    }
                }

                if ($errors->has('email')) {
                    $emailErrors = $errors->get('email');
                    foreach ($emailErrors as $error) {
                        $allErrors['email'] = $error;
                    }
                }

                if ($errors->has('Position')) {
                    $PositiondErrors = $errors->get('Position');
                    foreach ($PositiondErrors as $error) {
                        $allErrors['Position'] = $error;
                    }
                }

                if ($errors->has('mobile')) {
                    $mobileErrors = $errors->get('mobile');
                    foreach ($mobileErrors as $error) {
                        $allErrors['mobile'] = $error;
                    }
                }

                if ($errors->has('person_with_disability')) {
                    $person_with_disabilityErrors = $errors->get('person_with_disability');
                    foreach ($person_with_disabilityErrors as $error) {
                        $allErrors['person_with_disability'] = $error;
                    }
                }

                if ($errors->has('ProvideOfPosition')) {
                    $ProvideOfPositionErrors = $errors->get('ProvideOfPosition');
                    foreach ($ProvideOfPositionErrors as $error) {
                        $allErrors['ProvideOfPosition'] = $error;
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

                if ($errors->has('linkedin_profile')) {
                    $linkedin_profileErrors = $errors->get('linkedin_profile');
                    foreach ($linkedin_profileErrors as $error) {
                        $allErrors['linkedin_profile'] = $error;
                    }
                }

            }

            if($request->input('nationality') == 'Jordanian'){
                $validator = Validator::make($request->all(), [
                    'national_id' => 'required|digits:10|unique:bigbyorange_users,national_id',
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
                    'passport_number' => 'required|unique:bigbyorange_users,passport_number',
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

            session()->forget('step1');
            session()->put('step2', $allErrors);

            if ($allErrors != []){
                return redirect()->route('BigByOrange-registration.index')->withErrors($allErrors)->withInput();
            } else {
                Session::put('form_step2', $request->all());
                // dd(Session::get('form_step1'));
                // dd(Session::get('form_step2'));
                return redirect()->route('BigByOrange-registration.index')->withInput(['step' => 3]);
            }

        }

        elseif ($request->input('step') == 3) {

            // dd('step 3');

            $allErrors = [];

            $validator = Validator::make($request->all(), [
                'Startup' => 'required|array|min:1',
                'Startup_Name' => 'required',
                'Website' => 'required|url',
                'Social_Media' => 'required|url',

                'problem_your_startup' => 'required',
                'describe_your_solution' => 'required',
                'MVP_Demo' => 'required',
                'startup_registered' => 'required|array|min:1',

                'registration_number' => 'required',
                'startup_serve' => 'required|array|min:1',
                'Funds' => 'required',
                'source_funds' => 'required|array|min:1',

                'amount_of_funds' => 'required',
                'new_funds' => 'required',
                'markets' => 'required|array|min:1',
                'revenue' => 'required',

                'milestones_and_achievements' => 'required',
            ]);
            $allErrors = [];

            if ($validator->fails()) {
                $allErrors = [];
                $errors = $validator->errors();

                if ($errors->has('Startup')) {
                    $StartupErrors = $errors->get('Startup');
                    foreach ($StartupErrors as $error) {
                        $allErrors['Startup'] = $error;
                    }
                }

                if ($errors->has('Startup_Name')) {
                    $Startup_NameErrors = $errors->get('Startup_Name');
                    foreach ($Startup_NameErrors as $error) {
                        $allErrors['Startup_Name'] = $error;
                    }
                }

                if ($errors->has('Website')) {
                    $WebsiteErrors = $errors->get('Website');
                    foreach ($WebsiteErrors as $error) {
                        $allErrors['Website'] = $error;
                    }
                }

                if ($errors->has('Social_Media')) {
                    $Social_MediaErrors = $errors->get('Social_Media');
                    foreach ($Social_MediaErrors as $error) {
                        $allErrors['Social_Media'] = $error;
                    }
                }

                if ($errors->has('problem_your_startup')) {
                    $problem_your_startupErrors = $errors->get('problem_your_startup');
                    foreach ($problem_your_startupErrors as $error) {
                        $allErrors['problem_your_startup'] = $error;
                    }
                }

                if ($errors->has('describe_your_solution')) {
                    $describe_your_solutionErrors = $errors->get('describe_your_solution');
                    foreach ($describe_your_solutionErrors as $error) {
                        $allErrors['describe_your_solution'] = $error;
                    }
                }

                if ($errors->has('MVP_Demo')) {
                    $MVP_DemoErrors = $errors->get('MVP_Demo');
                    foreach ($MVP_DemoErrors as $error) {
                        $allErrors['MVP_Demo'] = $error;
                    }
                }

                if ($errors->has('startup_registered')) {
                    $startup_registeredErrors = $errors->get('startup_registered');
                    foreach ($startup_registeredErrors as $error) {
                        $allErrors['startup_registered'] = $error;
                    }
                }

                if ($errors->has('registration_number')) {
                    $registration_numberErrors = $errors->get('registration_number');
                    foreach ($registration_numberErrors as $error) {
                        $allErrors['registration_number'] = $error;
                    }
                }

                if ($errors->has('startup_serve')) {
                    $startup_serveErrors = $errors->get('startup_serve');
                    foreach ($startup_serveErrors as $error) {
                        $allErrors['startup_serve'] = $error;
                    }
                }

                if ($errors->has('Funds')) {
                    $FundsErrors = $errors->get('Funds');
                    foreach ($FundsErrors as $error) {
                        $allErrors['Funds'] = $error;
                    }
                }

                if ($errors->has('source_funds')) {
                    $source_fundsErrors = $errors->get('source_funds');
                    foreach ($source_fundsErrors as $error) {
                        $allErrors['source_funds'] = $error;
                    }
                }

                if ($errors->has('amount_of_funds')) {
                    $amount_of_fundsErrors = $errors->get('amount_of_funds');
                    foreach ($amount_of_fundsErrors as $error) {
                        $allErrors['amount_of_funds'] = $error;
                    }
                }

                if ($errors->has('new_funds')) {
                    $new_fundsErrors = $errors->get('new_funds');
                    foreach ($new_fundsErrors as $error) {
                        $allErrors['new_funds'] = $error;
                    }
                }

                if ($errors->has('markets')) {
                    $marketsErrors = $errors->get('markets');
                    foreach ($marketsErrors as $error) {
                        $allErrors['markets'] = $error;
                    }
                }

                if ($errors->has('revenue')) {
                    $revenueErrors = $errors->get('revenue');
                    foreach ($revenueErrors as $error) {
                        $allErrors['revenue'] = $error;
                    }
                }

                if ($errors->has('milestones_and_achievements')) {
                    $milestones_and_achievementsErrors = $errors->get('milestones_and_achievements');
                    foreach ($milestones_and_achievementsErrors as $error) {
                        $allErrors['milestones_and_achievements'] = $error;
                    }
                }

            }

            if ($allErrors != []){
                return redirect()->route('BigByOrange-registration.index')->withErrors($allErrors)->withInput();
            } else {
                Session::put('form_step3', $request->all());

                // dd(Session::get('form_step1'));
                // dd(Session::get('form_step2'));
                // dd(Session::get('form_step3'));
                return redirect()->route('BigByOrange-registration.index')->withInput(['step' => 4]);
            }

        }

        elseif ($request->input('step') == 4) {
            // dd('step 4');

            $allErrors = [];

            $validator = Validator::make($request->all(), [
                'describe_the_effect' => 'required',
                'business_opportunities' => 'required',
                'specify_units' => 'required',
                'expectations' => 'required',
                'consent_to_receiving' => 'required',
            ]);
            if ($validator->fails()) {
                $allErrors = [];
                $errors = $validator->errors();
                if ($errors->has('describe_the_effect')) {
                    $describe_the_effectErrors = $errors->get('describe_the_effect');
                    foreach ($describe_the_effectErrors as $error) {
                        $allErrors['describe_the_effect'] = $error;
                    }
                }
                if ($errors->has('business_opportunities')) {
                    $business_opportunitiesErrors = $errors->get('business_opportunities');
                    foreach ($business_opportunitiesErrors as $error) {
                        $allErrors['business_opportunities'] = $error;
                    }
                }
                if ($errors->has('specify_units')) {
                    $specify_unitsErrors = $errors->get('specify_units');
                    foreach ($specify_unitsErrors as $error) {
                        $allErrors['specify_units'] = $error;
                    }
                }
                if ($errors->has('expectations')) {
                    $expectationsErrors = $errors->get('expectations');
                    foreach ($expectationsErrors as $error) {
                        $allErrors['expectations'] = $error;
                    }
                }
                if ($errors->has('consent_to_receiving')) {
                    $consent_to_receivingErrors = $errors->get('consent_to_receiving');
                    foreach ($consent_to_receivingErrors as $error) {
                        $allErrors['consent_to_receiving'] = $error;
                    }
                }
            }

            if ($allErrors != []){
                return redirect()->route('BigByOrange-registration.index')->withErrors($allErrors)->withInput();
            } else {

                Session::put('form_step4', $request->all());

                // dd(Session::get('form_step2')['first_name']);

                try {
                    $new_user = new BigbyOrange;

                    // dd($new_user);

                    // Step 1

                    $new_user->evaluation_purposes = Session::get('form_step1')['evaluation_purposes'];

                    // Step 2

                    $new_user->first_name = Session::get('form_step2')['first_name'];
                    $new_user->father_name = Session::get('form_step2')['father_name'];
                    $new_user->grandfather_name = Session::get('form_step2')['grandfather_name'];
                    $new_user->last_name = Session::get('form_step2')['last_name'];

                    $new_user->nationality = Session::get('form_step2')['nationality'];
                    if(Session::get('form_step2')['nationality'] == 'Jordanian'){
                        $new_user->national_id = Session::get('form_step2')['national_id'];
                    } else {
                        $new_user->passport_number = Session::get('form_step2')['passport_number'];
                    };
                    $new_user->major_study = Session::get('form_step2')['major_study'];

                    $new_user->linkedin_profile = Session::get('form_step2')['linkedin_profile'];
                    $new_user->birthday = Session::get('form_step2')['birthday'];
                    $new_user->gender = Session::get('form_step2')['gender'];
                    $new_user->email = Session::get('form_step2')['email'];

                    $new_user->mobile = Session::get('form_step2')['mobile'];
                    $new_user->residence = Session::get('form_step2')['residence'];
                    $new_user->education = Session::get('form_step2')['education'];
                    $new_user->employment = Session::get('form_step2')['employment'];

                    $new_user->person_with_disability = Session::get('form_step2')['person_with_disability'];
                    $new_user->Male_Co_Founders = Session::get('form_step2')['Male_Co_Founders'];
                    $new_user->Female_Co_Founders = Session::get('form_step2')['Female_Co_Founders'];
                    $new_user->Position = Session::get('form_step2')['Position'];
                    $new_user->ProvideOfPosition = Session::get('form_step2')['ProvideOfPosition'];


                    // Step 3


                    $new_user->Startup = serialize(Session::get('form_step3')['Startup']);
                    $new_user->Startup_Name = Session::get('form_step3')['Startup_Name'];
                    $new_user->Website = serialize(Session::get('form_step3')['Website']);
                    $new_user->Social_Media = Session::get('form_step3')['Social_Media'];

                    $new_user->problem_your_startup = serialize(Session::get('form_step3')['problem_your_startup']);
                    $new_user->describe_your_solution = Session::get('form_step3')['describe_your_solution'];
                    $new_user->MVP_Demo = Session::get('form_step3')['MVP_Demo'];
                    $new_user->startup_registered = serialize(Session::get('form_step3')['startup_registered']);

                    $new_user->registration_number = serialize(Session::get('form_step3')['registration_number']);
                    $new_user->startup_serve = serialize(Session::get('form_step3')['startup_serve']);
                    $new_user->Funds = serialize(Session::get('form_step3')['Funds']);
                    $new_user->source_funds = serialize(Session::get('form_step3')['source_funds']);

                    $new_user->amount_of_funds = Session::get('form_step3')['amount_of_funds'];
                    $new_user->new_funds = Session::get('form_step3')['new_funds'];
                    $new_user->markets = serialize(Session::get('form_step3')['markets']);
                    $new_user->revenue = Session::get('form_step3')['revenue'];

                    $new_user->milestones_and_achievements = serialize(Session::get('form_step3')['milestones_and_achievements']);

                    // Step 4

                    $new_user->describe_the_effect = serialize(Session::get('form_step4')['describe_the_effect']);
                    $new_user->business_opportunities = Session::get('form_step4')['business_opportunities'];
                    $new_user->specify_units = serialize(Session::get('form_step4')['specify_units']);
                    $new_user->expectations = Session::get('form_step4')['expectations'];
                    $new_user->consent_to_receiving = Session::get('form_step4')['consent_to_receiving'];

                    // dd($new_user);

                    $new_user->save();
                    return redirect('/thanks');

                } catch (QueryException $e) {
                        dd($e);
                        $errorMessage  = 'حدث خطأ في عملية التسجيل.';
                        $request->session()->put('error', $errorMessage);
                        return redirect('/ODC')->withInput();
                }
            }
        }
    }

    public function filter(Request $request)
    {
        $users = BigbyOrange::query();
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

    /**
     * Display the specified resource.
     *
     * @param  \App\BigbyOrange  $bigbyOrange
     * @return \Illuminate\Http\Response
     */
    public function show(BigbyOrange $bigbyOrange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BigbyOrange  $bigbyOrange
     * @return \Illuminate\Http\Response
     */
    public function edit(BigbyOrange $bigbyOrange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BigbyOrange  $bigbyOrange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BigbyOrange $bigbyOrange)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BigbyOrange  $bigbyOrange
     * @return \Illuminate\Http\Response
     */
    public function destroy(BigbyOrange $bigbyOrange)
    {
        //
    }
}
