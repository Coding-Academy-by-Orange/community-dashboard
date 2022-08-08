<?php

namespace App\Http\Controllers;

use App\CodeChallenge;
use App\EnglishQuiz;
use App\Questionnaire;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDashboard()
    {
        if (auth()->user()->is_email_verified == 0) {
            // $code = mt_rand(1000, 9999);
            // User::where('id', auth()->id())->update([
            //     "email_verification" => $code,
            // ]);
            return redirect()->route('auth.email.verification2');
        } elseif (auth()->user()->is_mobile_verified == 0) {
            $mcode = mt_rand(1000, 9999);
            $content = [
                "receiverMobile" => substr(auth()->user()->mobile , 1) ,
                "mobile_verification" => $mcode,
                'senderMobile' => 777777777,
                'code' => $mcode
            ];
            // User::updateAndSendSMS($content);
            return redirect()->route('basic.info.step3.index');
        } elseif (auth()->user()->nationality == null) {
            return redirect()->route('basic.info');
        } else {
            return view('client.dashboard')->with('information', User::where('id', auth()->id())->first());
        }

    }
    public function submission()
    {
        if (auth()->user()->is_submitted == 0) {
            if ((CodeChallenge::where('user_id', auth()->id())->first() != null) && (EnglishQuiz::where('user_id', auth()->id())->first() != null )&& (Questionnaire::count() == auth()->user()->questionnaires->count()) && (auth()->user()->educational_level != null) && (auth()->user()->educational_background != null) && (auth()->user()->ar_writing != null) && (auth()->user()->ar_speaking != null )&&
                ( auth()->user()->en_writing != null) && (auth()->user()->en_speaking != null ) && (auth()->user()->city != null) && (auth()->user()->address != null) && (auth()->user()->relative_mobile_1 != null) &&( auth()->user()->relative_relation_1 != null)
                && (auth()->user()->relative_mobile_2 != null) && (auth()->user()->relative_relation_2 != null) &&( auth()->user()->is_committed == 1)) {
                User::where('id', auth()->id())->update([
                    'status' => 'submitted',
                    'is_submitted' => 1,
                ]);

                // Send EMail when he submitted
                $emailTo = auth()->user()->email;                
                /*$data = [
                    'name'=> 'Coding Academy',                    
                    'email'=> $emailTo
                ];
*/
                $subject = 'Thank You For Submitting - Orange Coding Academy';

                 Mail::send('emails.applicationSubmit', ['user' => $emailTo], function ($m) use ($emailTo) {
                $m->from('no-reply@orangecodingacademy.com', 'Orange Coding Academy');
                $m->to($emailTo)->subject('Thank you for your registration  - Orange Coding Academy');
        });
            //Mail::to($to_email)->send(new SendEmailVerification($data, $subject));
            // End Send Email 

                return back()->with('status_store', 'Your application Has been submitted!');
            }
        }elseif(auth()->user()->is_submitted == 1){
            return back()->with('status_destroy', 'You have Already Submit your application');
        }else{
            return back()->with('status_destroy', 'Please Complete Your Application before Submitting');
        }

    }
}
