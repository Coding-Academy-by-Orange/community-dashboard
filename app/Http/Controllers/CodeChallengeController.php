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
            // dd('data_since');
            if (auth()->user()->academy_location == 'data science') {
                return view('client.ds.ds_code_challenge');
            } else {
                return view('client.code_challenge');
            }
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
        if (auth()->user()->academy_location == 'data science') {
            $request->validate([
                'code_score_image_python' => 'required|image',
                'code_score_image_math' => 'required|image',
                'code_score_image_iq' => 'required|image',
            ]);
            if ($request->code_score_image_python != null) {
                $img_python = Storage::disk('public')->put('images', $request->file('code_score_image_python'));
            }
            if ($request->code_score_image_math != null) {
                $img_math = Storage::disk('public')->put('images', $request->file('code_score_image_math'));
            }
            if ($request->code_score_image_iq != null) {
                $img_iq = Storage::disk('public')->put('images', $request->file('code_score_image_iq'));
            }
            CodeChallenge::create([
                'user_id' => auth()->id(),
                "code_score" => 0,
                "code_account_link" => 'no link',
                "code_score_image" => 'no image',
                "code_account_link_python" => 'no link',
                "code_score_image_python" => $img_python,
                "code_score_image_math" => $img_math,
                "code_score_image_iq" => $img_iq,
            ]);
            return redirect()->route('client.dashboard')->with('status_store', 'Your data has been submitted successfully ');
        } else {
            $request->validate([
                'code_score' => 'required|integer|min:1',
                'code_account_link' => ['required', 'url'],
                'code_score_image' => 'required|image',
            ]);
            if ($request->code_score_image != null) {
                $img = Storage::disk('public')->put('images', $request->file('code_score_image'));
            }
            CodeChallenge::create([
                'user_id' => auth()->id(),
                "code_score" => $request->code_score,
                "code_account_link" => $request->code_account_link,
                "code_score_image" => $img,
            ]);
            return redirect()->route('client.dashboard')->with('status_store', 'Your data has been submitted successfully ');
        }


    }
}
