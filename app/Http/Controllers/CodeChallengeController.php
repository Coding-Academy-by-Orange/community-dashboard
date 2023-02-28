<?php

namespace App\Http\Controllers;

use App\CodeChallenge;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\TestFixture\C;

class CodeChallengeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        if (CodeChallenge::where('user_id', auth()->id())->first() != null) {
            return redirect()->route('client.dashboard')->with('status_destroy', 'This section is already submitted ');
        }
        if (auth()->user()->is_submitted == 0) {
            return view('client.code_challenge');
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
        if (CodeChallenge::where('user_id', auth()->id())->first() != null) {
            return back()->with('status_destroy', 'This Form is Already Filled');
        }
        $request->validate([
            'html_certificate' => 'required|image',
            'css_certificate' => 'required|image',
            'js_certificate' => 'required|image',
        ]);
        if ($request->html_certificate != null && $request->css_certificate && $request->js_certificate  ) {
            $html_certificate= Storage::disk('public')->put('images', $request->file('html_certificate'));
            $css_certificate= Storage::disk('public')->put('images', $request->file('css_certificate'));
            $js_certificate= Storage::disk('public')->put('images', $request->file('js_certificate'));
        }
        CodeChallenge::create([
            'user_id' => auth()->id(),
            "html_certificate" => $html_certificate,
            "css_certificate" => $css_certificate,
            "js_certificate" => $js_certificate,
        ]);
        return redirect()->route('client.dashboard')->with('status_store', 'Your data has been submitted successfully ');

    }
}
