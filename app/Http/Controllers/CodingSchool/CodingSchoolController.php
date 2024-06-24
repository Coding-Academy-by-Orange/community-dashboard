<?php

namespace App\Http\Controllers\CodingSchool;

use App\codingSchool;
use App\Activity;
use App\ComponentRegistration;
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
                $query->where('component', 'codingschool')
                    ->where('timeline', 'Public(component)')
                    ->whereNotNull('end_date')
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
            'major_study' => 'required',
            'residence' => 'required',
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
        $new_user->residence = $request->input('residence');
        $new_user->save();
        return redirect('/thanks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\codingSchool  $codingSchool
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = codingSchool::findOrFail($id);
        return view('admin.user.codingschool.show', compact('student'));
    }

    public function changeStatus(Request $request, $id)
    {
        $student = codingSchool::findOrFail($id);

        // Validate the request here if needed

        $newStatus = $request->input('new_status');
        $student->status = $newStatus;
        $student->save();

        return redirect()->route('admin.user.codingschool.show', $student->id)
            ->with('status', 'User status changed successfully.');
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

    public function thanks()
    {
        return view('public.codingschool.thanks');
    }

    public function register($registration_id)
    {
        $registration = ComponentRegistration::findOrFail($registration_id);
        if($registration->status == 'public' && $registration->component == 'codingschool'){
            return view('public.codingschool.register', compact('registration'));
        }else{
            return redirect('/codingschool/registration-not-found');
        }
        return view('public.codingschool.register');
    }
    public function mainRegistration()

    {
        $component_registration = ComponentRegistration::where('component', 'codingschool')
            ->where('status', 'active')
            ->get();
        return view('public.codingschool.main-registration', compact('component_registration'));
    }

    public function internshipRegistration($registration_id)
    {
        $registration = ComponentRegistration::findOrFail($registration_id);
        if($registration->status == 'Active' && $registration->component == 'codingschool'){
            return view('public.codingschool.internship-registration', compact('registration'));
        }else{
            return redirect('/codingschool/registration-not-found');
        }
    }

    public function internshipRegistrationStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'mobile' => 'required|numeric|digits:10|regex:/^07[0-9]{8}$/',
            'birthdate' => 'required|date|before:today',
            'father_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'grandfather_name' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'governorate' => 'required',
            'university' => 'required',
            'major_study' => 'required',
       'academic_year' => 'required',
        ]);
       // dd($validator->errors());
if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
}
        codingSchool::create($request->except(['_token', '_method']));

        return redirect('/thanks');
    }


    public function workshopRegistration($registration_id)
    {
        $registration = ComponentRegistration::findOrFail($registration_id);
//        dd($registration->status == 'Active');
        if($registration->status == 'Active' && $registration->component == 'codingschool'){
            return view('public.codingschool.workshop-registration', compact('registration'));
        }else{
            return redirect('/codingschool/registration-not-found');
        }
    }

    public function workshopRegistrationStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'mobile' => 'required|numeric|digits:10|regex:/^07[0-9]{8}$/',
            'birthdate' => 'required|date|before:today',
            'father_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'grandfather_name' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'governorate' => 'required',
            'university' => 'required',
            'major_study' => 'required',
            'academic_year' => 'required',
            'reason_to_join' => 'required',
            'availability' => 'required',
            'affordability' => 'required',
        ]);
if($validator->fails()){
    return redirect()->back()->withErrors($validator)->withInput();

}
        codingSchool::create($request->except(['_token', '_method']));


        return redirect('/thanks');
    }


    public function trainingRegistration($registration_id)
    {

        $registration = ComponentRegistration::findOrFail($registration_id);
        //dd($registration);
        if($registration->status == 'Active' && $registration->component == 'codingschool'){
            return view('public.codingschool.training-registration', compact('registration'));
        }else{
            return redirect('/codingschool/registration-not-found');
        }
    }

    public function trainingRegistrationStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:coding_schools,email',
            'mobile' => 'required|numeric|digits:10|regex:/^07[0-9]{8}$/',
            'birthdate' => 'required|date|before:today',
            'father_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'grandfather_name' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'governorate' => 'required',
            'university' => 'required',
            'major_study' => 'required',
            'academic_year' => 'required',
            'reason_to_join' => 'required',
            'technologies' => 'required',
            'availability' => 'required',
            'affordability' => 'required',
        ]);

        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Serialize the technologies array
    $data = $request->except(['_token', '_method']);
    $data['technologies'] = serialize($request->technologies);

    // Debugging (optional)
    // dd($data);

        codingSchool::create($data);

        return redirect('/thanks');
    }
}
