<?php

namespace App\Http\Controllers\FiberAcademy;

use App\FiberAcademy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FiberAcademyController extends Controller
{
    public function index()
    {
        return view( 'public.Fiber Academy.fiberacademy' );
    }

    public function create()
    {
        return view( 'public.Fiber Academy.create' );
    }

  
    public function store(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'full_name' => 'required|string|max:255',
                'email' => 'required|email|unique:fiber_academies,email',
                'age' => 'required|integer|min:18|max:30',
                'gender' => 'required|in:male,female',
                'education' => 'required|string',
                'specialization' => 'nullable|string|max:255',
                'experience_in_marketing' => 'required|boolean',
                'phone_number' => 'required|string|max:15|unique:fiber_academies,phone_number',
                'residence' => 'required|string',
                'join_motivation' => 'required|string',
                'challenge_handling' => 'required|string',
                'program_benefit' => 'required|string',
                'commitment_question' => 'required|string',
                'take_similar_courses' => 'required|boolean',
                'course_details' => 'nullable|string',
                'have_disability' => 'required|boolean',
                'disability_type' => 'nullable|string',
                'terms'=>"required"
            ]);

            if($validatedData['terms'] != "agree"){
                return redirect()->back()->with('error', 'You must agree to the terms and conditions.');
            }
            if($validatedData['take_similar_courses'] == true){
                $validatedData['course_details'] = $request->input('course_details');
            }
            if($validatedData['have_disability'] == true){
                $validatedData['disability_type'] = $request->input('disability_type');
            }

            
    
            // Create a new FiberAcademy record
            FiberAcademy::create([
                'full_name' => $validatedData['full_name'],
                'email' => $validatedData['email'],
                'age' => $validatedData['age'],
                'gender' => $validatedData['gender'],
                'education' => $validatedData['education'],
                'Specialization' => $validatedData['specialization'],
                'experience_in_marketing' => $validatedData['experience_in_marketing'],
                'phone_number' => $validatedData['phone_number'],
                'residence' => $validatedData['residence'],
                'join_motivation' => $validatedData['join_motivation'],
                'challenge_handling' => $validatedData['challenge_handling'],
                'program_benefit' => $validatedData['program_benefit'],
                'commitment_question' => $validatedData['commitment_question'],
                'take_similar_courses' => $validatedData['take_similar_courses'],
                'courses_you_take' => $validatedData['course_details'],
                'have_disability' => $validatedData['have_disability'],
                'disability_type' => $validatedData['disability_type'],
            ]);
    
            // Success response
            return redirect()->back()->with('success', 'Registration successful!');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
                
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Registration Error: ' . $e->getMessage());
    
            // Show a generic error message
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }

    public function show($id){
        $student = FiberAcademy::findOrFail($id);
        return view('admin.user.fiberacademy.show', compact('student'));
    }

    public function changeStatus(Request $request, $id){
        $student = FiberAcademy::findOrFail($id);

        $newStatus = $request->input('new_status');
        $student->status = $newStatus;
        $student->save();

        return redirect()->route('users.index')
            ->with('success', 'User status changed successfully.');
    }

    public function destroy($id){
        FiberAcademy::destroy($id);
        return redirect()->back();
    }


    
}
