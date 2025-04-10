<?php

namespace App\Http\Controllers\ODC;

use App\ODC;
use App\digitalcenter_trainers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ODCTrainerController extends Controller
{

    public function index()
    {
        return view('public.digitalcenter.odctrainerfrom');
        

    }

    public function adminindex()
    {
        $trainers = digitalcenter_trainers::all();
    return view('admin.digital-center.index', compact('trainers'));
    }
    public function create()
    {
        return view('public.digitalcenter.odctrainerfrom');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'trainer_name' => 'required|string',
            'trainer_phone' => 'required|string|min:10|max:10',
            'trainer_email' => 'required|email|unique:digitalcenter_trainers,trainer_email',
            'organization' => 'required|string',
            'digital_center' => 'required|string',
            'governorate' => 'required|string',
            'courses' => 'nullable|array',
            'career_months' => 'nullable|array',
            'career_days' => 'nullable|integer|min:0',
            'career_topics' => 'nullable|array',
            'soft_months' => 'nullable|array',
            'soft_days' => 'nullable|integer|min:0',
            'topics' => 'nullable|array',
            'digital_topics' => 'nullable|array',
            'entre_months' => 'nullable|array',
            'entre_days' => 'nullable|integer|min:0',
            'entre_topics' => 'nullable|array',
            'freelance_months' => 'nullable|array',
            'freelance_days' => 'nullable|integer|min:0',
            'freelance_topics' => 'nullable|array',
            'other_months' => 'nullable|array',
            'other_days' => 'nullable|integer|min:0',
            'other_topics' => 'nullable|string',
            'other' => 'nullable|string',
        ]);

      

        \Log::info('Request Data:', $request->all());

        digitalcenter_trainers::create($validated);
        return redirect('/thanks');
        // Training::create($request->all());

        // return redirect('/success')->with('success', 'Registration Successful!');
 
    }

     // Add this method to handle deletion
     public function destroy($id)
     {
         $trainer = digitalcenter_trainers::find($id);
 
         if (!$trainer) {
             return redirect()->route('admin.digital-center.index')->with('error', 'Trainer not found.');
         }
 
         $trainer->delete();
 
         return redirect()->route('digital-center.index')->with('success', 'Trainer deleted successfully.');
     }
 
     // Add this method to handle editing
     public function edit($id)
     {
         $trainer = digitalcenter_trainers::find($id);
 
         if (!$trainer) {
             return redirect()->route('admin.digital-center.index')->with('error', 'Trainer not found.');
         }
 
         return view('admin.digital-center.edit', compact('trainer'));
     }
 
     // Add this method to handle updating
     public function update(Request $request, $id)
     {
         $trainer = digitalcenter_trainers::find($id);
 
         if (!$trainer) {
             return redirect()->route('admin.digital-center.index')->with('error', 'Trainer not found.');
         }
 
         $validated = $request->validate([
             'trainer_name' => 'required|string',
             'trainer_phone' => 'required|string|min:10|max:10',
             'trainer_email' => 'required|email|unique:digitalcenter_trainers,trainer_email,' . $id,
             'organization' => 'required|string',
            //  'digital_center' => 'required|string',
            //  'governorate' => 'required|string',
            //  'courses' => 'nullable|array',
            //  'career_months' => 'nullable|array',
            //  'career_days' => 'nullable|integer|min:0',
            //  'career_topics' => 'nullable|array',
            //  'soft_months' => 'nullable|array',
            //  'soft_days' => 'nullable|integer|min:0',
            //  'topics' => 'nullable|array',
            //  'digital_topics' => 'nullable|array',
            //  'entre_months' => 'nullable|array',
            //  'entre_days' => 'nullable|integer|min:0',
            //  'entre_topics' => 'nullable|array',
            //  'freelance_months' => 'nullable|array',
            //  'freelance_days' => 'nullable|integer|min:0',
            //  'freelance_topics' => 'nullable|array',
            //  'other_months' => 'nullable|array',
            //  'other_days' => 'nullable|integer|min:0',
            //  'other_topics' => 'nullable|string',
            //  'other' => 'nullable|string',
         ]);
 
         $trainer->update($validated);
 
         return redirect()->route('digital-center.index')->with('success', 'Trainer updated successfully.');
     }
 
}
