<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {

        return view('auth.adminLogin');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            $email = $request->email;
//                ::where('email', $email)->get();
            //get user info the autnticated users
            $admin = Auth::guard('admin')->user();
            //dd($admin);
            if ($admin->component == 'innovation') {
                return redirect()->intended('/admin/innovation-hub/dashboard');
            } else {
                return redirect()->intended('/admin/dashboard');
            }
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }
}
