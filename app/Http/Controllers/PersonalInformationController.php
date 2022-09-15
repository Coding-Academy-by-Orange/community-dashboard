<?php

namespace App\Http\Controllers;

use App\Newletter;
use App\Newsletter;
use App\PersonalInformation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        if (auth()->user()->is_submitted == 0) {
            if (auth()->user()->academy_location == 'data science') {
                //dd('data science');
                return view('client.ds.ds_personal_information')->with('user', User::where('id', auth()->id())->first());
            } else {
                return view('client.personal_information')->with('user', User::where('id', auth()->id())->first());
            }
        } else {
            return back();
        }
    }

    public function personal_information_step1(Request $request)
    {

//            $request->validate([
//            "educational_level"           => 'required | string',
//            "educational_background"      => 'required | string',
//            ]);
        $user = User::where('id', Auth::user()->id)->first();
        User::where('id', $user->id)->update([
            "educational_level" => $request->educational_level,
            "educational_status" => $request->educational_status,
            "field" => $request->field,
            "educational_background" => $request->educational_background,
            "field_of_study" => $request->field_of_study,
            "field_of_specialization" => $request->field_of_specialization,


        ]);
    }

    public function personal_information_step2(Request $request)
    {
//        $request->validate([
//            "ar_writing"   => 'required | string',
//            "ar_speaking"  => 'required | string',
//            "en_writing"   => 'required | string',
//            "en_speaking"  => 'required | string',
//        ]);

        $user = User::where('id', Auth::user()->id)->first();
        User::where('id', $user->id)->update([
            "ar_writing" => $request->ar_writing,
            "ar_speaking" => $request->ar_speaking,
            "en_writing" => $request->en_writing,
            "en_speaking" => $request->en_speaking
        ]);

    }

    public function personal_information_step3(Request $request)
    {
//        $request->validate([
//            "city"      => 'required | string',
//            "address"   => 'required | string',
//        ]);

        $user = User::where('id', Auth::user()->id)->first();
        User::where('id', $user->id)->update([
            "city" => $request->city,
            "address" => $request->address,
            /*"mobile" => $request->mobile,*/
            "know_us" => $request->know_us,
            "disability" => $request->disability,
        ]);
    }

    public function personal_information_step4(Request $request)
    {
//        $request->validate([
//            "relative_relation_1"  => 'required | string',
//            "relative_mobile_1"    => 'required | string',
//            "relative_relation_2"  => 'required | string',
//            "relative_mobile_2"    => 'required | string',
//        ]);
        if ($request->is_committed == null) {
            $is_committed = 0;
        } else {
            $is_committed = 1;
        }

        $user = User::where('id', Auth::user()->id)->first();
        User::where('id', $user->id)->update([
            "relative_relation_1" => $request->relative_relation_1,
            "relative_mobile_1" => $request->relative_mobile_1,
            "relative_relation_2" => $request->relative_relation_2,
            "relative_mobile_2" => $request->relative_mobile_2,
            "is_committed" => $is_committed,
            "fullName_1" => $request->fullName_1,
            "fullName_2" => $request->fullName_2,
        ]);

        return redirect(route('client.dashboard'))->with('status_store', 'Your data has been submitted successfully ');

    }


}
