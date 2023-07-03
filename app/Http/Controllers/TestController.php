<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        session()->forget('status');
        session()->forget('error');
        try {
            $new_user = new Test();
            $new_user->name = $request->input('name');
            $new_user->save();
            $request->session()->put('status', 'Form submitted successfully!');
            return redirect('/test');

        } catch (QueryException $e) {
            if ($e->errorInfo[1] === 1062) {
                $name = 'name';

                if (strpos($e->errorInfo[2], $name) !== false) {
                    $errorMessage  = 'Name Should be Unique';
                    $request->session()->put('error', $errorMessage);
                    return redirect('/test')->withInput();
                }  else {
                    $errorMessage  = 'An error occurred during registration.';
                    $request->session()->put('error', $errorMessage);
                    return redirect('/test')->withInput();
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
