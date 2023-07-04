<?php

namespace App\Http\Controllers;

use Excel;
use App\ODC;
use App\User;
use Carbon\Carbon;
use App\BigbyOrange;
use App\FablabUsers;
use App\Questionnaire;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */


    public function fileImportExport()
    {
       return view('file-import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request)
    {
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport()
    {
        return Excel::download(new UsersExport, 'users-collection.xlsx');
    }


    public function index()
    {
        $user = Auth::user();
        if($user->component == 'fablab'){
            return view('admin.user.read',[
                'status' => 'All',
                'result_1' => 'All',
                'nationality' => 'All',
                'gender' => 'All',
                'year' => 'All',
                'commitment' => 'All',
                'educational_background' => 'All',
                'educational_level' => 'All',
                'academy_location' => 'ALL'
            ])->with('users', FablabUsers::orderBy('first_name')->get());
        }
        else if ($user->component == 'digitalcenter'){
            return view('admin.user.read',[
                'status' => 'All',
                'result_1' => 'All',
                'nationality' => 'All',
                'gender' => 'All',
                'year' => 'All',
                'commitment' => 'All',
                'educational_background' => 'All',
                'educational_level' => 'All',
                'academy_location' => 'ALL'
            ])->with('users', ODC::orderBy('first_name')->get());
        }
        else if ($user->component == 'bigbyorange'){
            return view('admin.user.read',[
                'status' => 'All',
                'result_1' => 'All',
                'nationality' => 'All',
                'gender' => 'All',
                'year' => 'All',
                'commitment' => 'All',
                'educational_background' => 'All',
                'educational_level' => 'All',
                'academy_location' => 'ALL'
            ])->with('users', BigbyOrange::orderBy('first_name')->get());
        }
        else if (Auth::user()->is_super) {

            // $FablabUsers = FablabUsers::select('id', 'first_name', 'last_name', 'education', 'national_id', 'passport_number', 'residence')->get();
            // $ODCUsers = ODC::select('id', 'first_name', 'last_name', 'education', 'national_id', 'passport_number', 'residence')->get();


            $FablabUsers = FablabUsers::get();
            $ODCUsers = ODC::get();
            $BigbyOrangeUsers = BigbyOrange::get();
            $user = $FablabUsers->concat($ODCUsers)->concat($BigbyOrangeUsers);
            return view('admin.user.read',[
                'status' => 'All',
                'result_1' => 'All',
                'nationality' => 'All',
                'gender' => 'All',
                'year' => 'All',
                'commitment' => 'All',
                'educational_background' => 'All',
                'educational_level' => 'All',
                'academy_location' => 'ALL'
            ])->with('users', $user);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */

    public function filter(Request $request){
        $users = User::query();
        if($request->filled('status')){
            $users->where('status', $request->status)->orderBy('en_first_name');
        }
        if($request->filled('result_1')){
            $users->where('result_1', $request->result_1)->orderBy('en_first_name');
        }
        if($request->filled('nationality')){
            $users->where('nationality', $request->nationality)->orderBy('en_first_name');
        }
        if($request->filled('gender')){
            $users->where('gender', $request->gender)->orderBy('en_first_name');
        }
        if($request->filled('year')){
            $users->where('year', $request->year)->orderBy('en_first_name');
        }
        if($request->filled('commitment')){
            $users->where('is_committed', $request->commitment)->orderBy('en_first_name');
        }
        if($request->filled('educational_background')){
            $users->where('educational_background', $request->educational_background)->orderBy('en_first_name');
        }
        if($request->filled('educational_level')){
            $users->where('educational_level', $request->educational_level)->orderBy('en_first_name');
        }

	if($request->filled('academy_location')){
		$users->where('academy_location',$request->academy_location)->orderBy('en_first_name');
	}
        if( $request->status != ""){
            $status = $request->status;
        }else{
            $status = "All";
        }
        if( $request->result_1 != ""){
            $result_1 = $request->result_1;
        }else{
            $result_1 = "All";
        }
        if( $request->nationality != ""){
            $nationality = $request->nationality;
        }else{
            $nationality = "All";
        }
        if( $request->gender != ""){
            $gender = $request->gender;
        }else{
            $gender = "All";
        }
        if( $request->year != ""){
            $year = $request->year;
        }else{
            $year = "All";
        }
        if( $request->commitment != ""){
            $commitment = $request->commitment;
        }else{
            $commitment = "All";
        }
        if( $request->educational_background != ""){
            $educational_background = $request->educational_background;
        }else{
            $educational_background = "All";
        }
        if( $request->educational_level != ""){
            $educational_level = $request->educational_level;
        }else{
            $educational_level = "All";
	}
	if($request->academy_location != ""){
		$academy_location = $request->academy_location;
	}else{
		$academy_location = "ALL";
	}
        return view('admin.user.read', [
            'users' => $users->where('nationality', "!=" ,null)->get(),
            'status' => $status,
            'result_1' => $result_1,
            'nationality' => $nationality,
            'gender' => $gender,
            'year' => $year,
            'commitment' => $commitment,
            'educational_background' => $educational_background ,
	    'educational_level' => $educational_level,
	    'academy_location'  => $academy_location,
            "personal_img" => $request->personal_img,
            "id_img" => $request->personal_img,
            "vaccination_img" => $request->personal_img,
        ]);
    }

    public function status(Request $request, $id){
        $validated = $request->validate([
            'result_1' => 'required'
        ]);
        User::where('id', $id)->first()->update(
            [
                'result_1' => $request->result_1 ,
                'status' =>$request->result_1 ,
                ]

        );
        return back()->with('status_store', 'The Status Has been Updated Successfully' );
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(User $user)
    {

        $dateOfBirth = $user->day."/".$user->month."/".$user->year;
        $age =  Carbon::parse($dateOfBirth)->age;
        if(!DB::table('code_challenges')->where('user_id', $user->id)->exists()){
            $code_score = '_';
            $code_account_link = '_';
            $code_score_image = '_';
        }else{
            $html_certificate = Storage::disk('local')->url(DB::table('code_challenges')->where('user_id', $user->id)->first()->html_certificate);
            $css_certificate = Storage::disk('local')->url(DB::table('code_challenges')->where('user_id', $user->id)->first()->css_certificate);
            $js_certificate = Storage::disk('local')->url(DB::table('code_challenges')->where('user_id', $user->id)->first()->js_certificate);
        }
        if(!DB::table('english_quizzes')->where('user_id', $user->id)->exists()){
            $english_score = '_';
            $english_account_link = '_';
            $english_score_image = '_';
        }else{
            $english_score = DB::table('english_quizzes')->where('user_id', $user->id)->first()->english_score ;
            $english_account_link = DB::table('english_quizzes')->where('user_id', $user->id)->first()->english_account_link ;
            $english_score_image = Storage::disk('local')->url(DB::table('english_quizzes')->where('user_id', $user->id)->first()->english_score_image);
        }
        $questionnaires = Questionnaire::all() ;
        return view('admin.user.update', compact(['age','html_certificate','css_certificate','js_certificate', 'english_score' , 'english_account_link' , 'english_score_image',  'questionnaires', 'user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
