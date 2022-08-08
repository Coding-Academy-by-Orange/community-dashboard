<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Newsletter;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailVerification;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    */

    use RegistersUsers;

    protected $redirectTo = "user/dashboard";


    public function __construct()
    {
        $this->middleware('guest')->only('index');
    }

    private static function where(string $string, ?int $id)
    {
    }

    public function index()
    {
	    return view('auth.register');
	    //return view('auth.close');
    }

    public function terms(){
        return view('auth.terms');
    }

    public function help(){
        return view('auth.help');
    }

    public function register_step1(Request $request)
    {
        $request->validate([
            'email' => 'required | email | unique:users',
            'mobile' => 'required | size:10 | unique:users',
            'password' => 'required | min:6 | max:18',
            'chAgree' => 'accepted'
        ]);
        if ($request->is_newsletter == "on") {
            $is_newsletter = "on";
        } else {
            $is_newsletter = "off";
        }
        $emailCode = mt_rand(1000, 9999);
        $user = User::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'mobile' => $request->mobile,
            "email_verification" => $emailCode,
            'is_newsletter' => $is_newsletter
            // hard coded skip email validation
            //'is_email_verified'=>1
        ]);
        // user login
        Auth::guard('web')->loginUsingId($user->id);
        //sending email
        // $user = User::where('id', Auth::user()->id)->first();
        $to_name = 'applicant';
        $to_email = auth()->user()->email;
        // $data = array('name' => "Coding Academy", 'body' => "Your Verification Code is: 1243 ");
        $data = [
                    'name'=> 'Coding Academy',
                    'body'=> 'Your Verification Code is: 1243',
                    'code'=> $emailCode
                ];

	$subject = 'Verification Code - Orange Coding Academy';
        Mail::to($to_email)->send(new SendEmailVerification($data, $subject));
        // Mail::send('emails.verification', $data, function ($message) use ($to_name, $to_email) {
        //     $message->to($to_email, $to_name)
        //         ->subject('');
        //     $message->from('marya.testing@gmail.com', 'Coding Academy by Orange');
        // });
        return redirect()->route('auth.email.verification2');

        // Hard coded escape email validation
        //dd(auth()->user()->email_verification);
       // return redirect()->route('register.step2',auth()->user()->email_verification);

    }

    public function register_step2(Request $request)
    {   
        //prepare variable for sending mails
        $mcode = mt_rand(1000, 9999);
        $content = [
            "receiverMobile" => substr(auth()->user()->mobile , 1) ,
            "mobile_verification" => $mcode,
            'senderMobile' => 777777777,
            'code' => $mcode
        ];
        if (auth()->user()->is_email_verified == '1' && auth()->user()->is_mobile_verified == '1') {
            return redirect()->route('client.dashboard');
        }elseif(auth()->user()->is_email_verified == '1' && auth()->user()->is_mobile_verified == '0'){
            User::updateAndSendSMS($content);
            return redirect()->route('basic.info.step3.index');
        }
        $request->validate([
            'email_verification' => 'required| size:4'
        ]);
        $user = auth()->user();
        if ($request->email_verification == $user->email_verification) {
//            if (auth()->user()->email_verification == $request->email_verification) {
            $user = User::where('id', Auth::user()->id)->first();
            User::where('id', auth()->id())->update([
                "is_email_verified" => 1,
            ]);
            User::updateAndSendSMS($content);
            return redirect()->route('basic.info.step3.index');
        } else {
            return back()->with('status_destroy', "Please enter a valid code!");
        }

    }

    public function resend_email_verification()
    {
       //$emailCode = mt_rand(1000, 9999);
       $to_email = auth()->user()->email;
       $emailCode = auth()->user()->email_verification;
         //$data = array('name' => "Coding Academy", 'body' => "Your Verification Code is: 1243 ");
        $data = [
            'name'=> 'Coding Academy',
            'body'=> 'Your Verification Code is: ',
            'code'=> $emailCode
        ];

        $subject = 'Verification Code';
        Mail::to($to_email)->send(new SendEmailVerification($data, $subject));

        return back()->with('status_store', "A verification code has been resent ");
    }

    public function resend_mobile_verification()
    {
        $mcode = mt_rand(1000, 9999);
        $content = [
            "receiverMobile" => substr(auth()->user()->mobile , 1) ,
            "mobile_verification" => $mcode,
            'senderMobile' => 777777777,
            'code' => $mcode
        ];
        User::updateAndSendSMS($content);
//        $code = mt_rand(1000, 9999);
//        $user = User::where('id', Auth::user()->id)->first();
//        User::where('id', $user->id)->update([
//            "mobile_verification" => $code,
//        ]);
        return back()->with("status_store", "A verification code has been resent ");
    }


    public function basic_info_index()
    {
        $user = User::where('id', auth()->id())->first();


        if ($user->en_first_name == '' || $user->en_first_name == null) {
            return view('client.basic_information');
        }

        return view('client.dashboard')->with('information', $user);
    }

    public function basic_info_step2_index()
    {
        $user = User::where('id', auth()->id())->first();
        if ($user->mobile == null) {
            return view('client.basic_information2');
        } else {
            return redirect()->route('client.dashboard');
        }
    }

    public function basic_info_step3_index()
    {
        $user = User::where('id', auth()->id())->first();
        if ($user->is_mobile_verified == 0) {
            return view('client.basic_information3');
        } else {
            return redirect()->route('client.dashboard');
        }
    }

    public function basic_info_step1(Request $request)
    {
        $user = User::where('id', auth()->id())->first();
        switch ($request->nationality) {
            case 1:
                $validated = $request->validate([
                    "nationality" => 'required',
                    "gender" => 'required',
                    "martial_status" => 'required',
                    "year" => 'required|string|size:4',
                    "month" => 'required|string',
		    "day" => 'required|string|size:2',
		    "academy_location"=>'required|string',
                    "en_first_name" => array(
                        'required'
                    ),
                    "en_second_name" => array(
                        'required'
                    ),
                    "en_third_name" => array(
                        'required'
                    ),
                    "en_last_name" => array(
                        'required'
                    ),
                    "ar_first_name" => array(
                        'required'
                    ),
                    "ar_second_name" => array(
                        'required'
                    ),
                    "ar_third_name" => array(
                        'required'
                    ),
                    "ar_last_name" => array(
                        'required'
                    )
                ]);
                User::where('id', $user->id)->update($validated);
                break;
            // this step does not redirect to home page
            case 0:
                $validated = $request->validate([
                    "nationality" => 'required',
                    "country" => 'required',
                    "gender" => 'required',
                    "martial_status" => 'required',
                    "year" => 'required|string|size:4',
                    "month" => 'required|string',
		    "day" => 'required|string|size:2',
		    "academy_location"=> 'required|string',
                    "en_first_name" => array(
                        'required'
                        /*'regex:/(^([a-zA-Z]+)(\d+)?$)/u'*/
                    ),
                    "en_second_name" => array(
                        'required'
                        /*'regex:/(^([a-zA-Z]+)(\d+)?$)/u'*/
                    ),
                    "en_last_name" => array(
                        'required'
//                        'regex:/^[ء-ي]+$/'
                    ),
                    "ar_first_name" => array(
                        'required'
                    ),
                    "ar_second_name" => array(
                        'required'
                    ),
                    "ar_last_name" => array(
                        'required'
                    )
                ]);
                User::where('id', $user->id)->update($validated);
                break;
            default:
                return back();
        }

        return redirect(route('client.dashboard'))->with('status_store', 'Your account has been Created Successfully ');
    }

//    public function basic_info_step2(Request $request)
//    {
//        $code = mt_rand(1000, 9999);
//        $request->validate([
//            'mobile' => 'required',
//        ]);
//        $content = [
//            "receiverMobile" => $request->mobile,
//            "mobile_verification" => $code,
//            'senderMobile' => 777777777,
//            'code' => $code
//        ];
//        User::updateAndSendSMS($content);
//
//        return redirect()->route('basic.info.step3.index');
//
//    }

    public function basic_info_step3(Request $request)
    {
        $request->validate([
            'mobile_verification' => 'required| size:4'
        ]);
        if (auth()->user()->mobile_verification == $request->mobile_verification) {
            $user = User::where('id', Auth::user()->id)->first();
            User::where('id', $user->id)->update([
                "is_mobile_verified" => 1,
            ]);
            return redirect()->route('client.dashboard');
        } else {
            return back()->with('status_destroy', 'please enter a valid code');
        }

    }
}
