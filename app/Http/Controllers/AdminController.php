<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->component == 'fablab') {
            $admins = Admin::orderByDesc('id')->where('component', 'fablab')->get();
        } else if ($user->component == 'digitalcenter') {
            $admins = Admin::orderByDesc('id')->where('component', 'digitalcenter')->get();
        } else if ($user->component == 'bigbyorange') {
            $admins = Admin::orderByDesc('id')->where('component', 'bigbyorange')->get();
        } else if ($user->component == 'codingacademy') {
            $admins = Admin::orderByDesc('id')->where('component', 'codingacademy')->get();
        } else if ($user->component == 'codingschool') {
            $admins = Admin::orderByDesc('id')->where('component', 'codingschool')->get();
        } else if ($user->component == 'fiber_academy') {
            $admins = Admin::orderByDesc('id')->where('component', 'fiber_academy')->get();    
        }   
        else if ((Auth::user()->is_super) && ($user->component == '')) {
            $admins = Admin::orderByDesc('id')->get();
        };
        


        return view('admin.admin.read', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function create()
    {
        return redirect()->route('admins.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Admin $admin)
    {
        return view('admin.admin.update', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    // Admin $admin
    public function update(Request $request, Admin $admin)
    {
        //        dd($admin);
        $validated = $request->validate([
            'fname' => 'Required|min:3',
            'lname' => 'Required|min:3',
            'email' => 'Required|email',
            'password' => 'required | min:6 | confirmed',
            'component' => 'required',
        ]);
        $validated['password'] = bcrypt($validated['password']);
        $admin->update($validated);
        return redirect()->route('admins.index')->with('status_update', 'The data has been updated successfully');
    }
}
