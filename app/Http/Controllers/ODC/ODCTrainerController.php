<?php

namespace App\Http\Controllers\ODC;

use App\ODC;
use App\ODCTrainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ODCTrainerController extends Controller
{

    public function index()
    {
        return view('public/digitalcenter/odctrainerfrom');
    }
    public function create()
    {
        return view('public\digitalcenter\odctrainerfrom');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'trainer_name' => 'required|string',
            'organization' => 'required|string',
            'digital_center' => 'required|string',
            'governorate' => 'required|string',
            'courses' => 'array',
            'career_months' => 'array',
            'career_days' => 'nullable|integer',
            'career_topics' => 'array',
            'soft_months' => 'array',
            'soft_days' => 'nullable|integer',
            'topics' => 'array',
            'digital_topics' => 'array',
            'entre_months' => 'array',
            'entre_days' => 'nullable|integer',
            'entre_topics' => 'array',
            'other' => 'nullable|string'
        ]);

        ODCTrainer::create($validated);
        return redirect('/thanks');
        // Training::create($request->all());

        // return redirect('/success')->with('success', 'Registration Successful!');
 
    }
}
