<?php

namespace App\Http\Controllers;

use App\EnglishQuiz;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EnglishQuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if (EnglishQuiz::where('user_id', auth()->id())->first() != null) {
            return redirect()->route('client.dashboard')->with('status_destroy', 'This section has been submitted already ');
        }
        if (auth()->user()->is_submitted == 0) {
            return view('client.english_quiz');
        } else {
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (EnglishQuiz::where('user_id', auth()->id())->first() != null) {
            return back()->with('status_destroy', 'This form has been filled already');
        }
        $request->validate([
            'english_score' => 'required',
            'english_account_link' => 'required',
            'english_score_image' => 'required|image',
        ]);
        if ($request->english_score_image != null) {
            $img = Storage::disk('public')->put('images', $request->file('english_score_image'));
        }
        EnglishQuiz::create([
            'user_id' => auth()->id(),
            "english_score" => $request->english_score,
            "english_account_link" => $request->english_account_link,
            "english_score_image" => $img,
        ]);
        return redirect()->route('client.dashboard')->with('status_store', 'Your data has been submitted successfully ');
    }
}
