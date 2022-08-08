<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class QuestionnaireAnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('client.questionnaire')->with('questionnaires', Questionnaire::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request)
    {
        try {
            $validation = $request->validate([
                'answer' => ['required']
            ]);
            $answers = $request->answer;

            // validate if all inputs are sent
            foreach ($answers as $answer) {
                if ($answer == '' || $answer == null) {
                    return response('err', 400);
                }
            }

            // find the user to attach the answers to him and store them in database
            $user = User::find(auth()->id());

            $i = 0;
            // store answers received by user
            foreach ($answers as $answer) {
                $user->questionnaires()->syncWithoutDetaching([
                    $request->questionnaire_id[$i] => [
                        'answer' => $answer
                    ]
                ]);
                $i++;
            }
            $request->session();
        } catch (QueryException $e) {
            Log::error($e);
        } catch (ValidationException $e) {
            return back()->with($validation);
        }
    }

}
