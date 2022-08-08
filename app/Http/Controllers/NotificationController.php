<?php

namespace App\Http\Controllers;

use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Notifications\NotifyApplicants;
class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.notification.read')->with('notifications', Notification::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.notification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sent_to' => 'required',
            'sent_via' => 'required',
            'body' => 'required',
        ]);

        $method = trim($request->sent_via);

        $receiver = trim($request->sent_to);

        if ($method == 'email'){
            $users = User::where('status', $receiver);

            foreach($users as $user){
                $content = [
                    'name' => $user->en_first_name
                ];
                $message = trim($request->body);

                Mail::to($user)->send(new \App\Mail\NotifyApplicants($content, $message));
            }
        }


        Notification::create([
            'admin_id' =>Auth::guard('admin')->id(),
            'sent_to' => $request->sent_to,
            'sent_via' => $request->sent_via,
            'body' => $request->body,
        ] );
        return redirect()->route('notifications.index')->with('status_store', 'A new notification has been sent successfully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Notification $notification)
    {
        return view('admin.notification.show')->with('notification', $notification);
    }

}
