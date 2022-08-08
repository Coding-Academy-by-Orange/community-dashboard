<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\QuestionnaireAnswer;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:admin');
    }

    public function index()
    {
            return view('admin.questionnaire.read')->with('questionnaires', Questionnaire::all());
    }


    public function create()
    {
            return view('admin.questionnaire.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'questionnaire' => 'required | min:6',
        ]);
        Questionnaire::create($validated);
        return redirect()->route('questionnaires.index')->with('status_store', 'A new questionnaire has been added successfully ');
    }


    public function edit(Questionnaire $questionnaire)
    {
            return view('admin.questionnaire.update', compact('questionnaire'));
    }


    public function update(Request $request, Questionnaire $questionnaire)
    {
        $request->validate([
            'questionnaire' => 'required| | min:6',
        ]);
        $questionnaire->update([
            'questionnaire' => $request->questionnaire,
        ]);
        return redirect()->route('questionnaires.index')->with('status_update', 'The questionnaire has been updated successfully ');
    }


    public function destroy(Questionnaire $questionnaire)
    {
        $questionnaire->delete();
        return redirect()->route('questionnaires.index')->with('status_destroy', 'The questionnaire has been deleted successfully ');
    }
}
