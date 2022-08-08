<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminRegisterController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:admin');
    }

    public function showRegisterForm()
    {
        return view('auth.adminRegister');
    }

    protected function create(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Admin::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('admins.index')->with('status_store', 'A new admin has been added successfully ');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => 'required | min:6 | confirmed',
        ]);
    }
}
