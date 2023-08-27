<?php

use App\FablabUsers;
use App\Http\Controllers\BigbyOrangeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ODCController;
use App\Http\Controllers\FablabUsersController;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('public.landingpage');
});

Route::get('/test', function () {
    return view('test');
});
Route::post('/test', [TestController::class, 'store'])->name('test.store');




Auth::routes();


Route::get('/home', "HomeController@showDashboard")->name('homeDashboard');

// Manual Register
Route::get('/register', "Auth\RegisterController@index");
Route::get('/terms', "Auth\RegisterController@terms");
Route::get('/help', "Auth\RegisterController@help");

// Google login & Register
Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback')->name('login.google.callback');


Route::post('register/step1', "Auth\RegisterController@register_step1")->name('register.step1');
Route::view('/email/verification', "auth.email_verification2")->name('auth.email.verification2');
//Route::post('register/step2', "Auth\RegisterController@register_step2" )->name('register.step2');

// Hard Coded To Skip Email validation
//Route::get('register/step2', "Auth\RegisterController@register_step2" )->name('register.step2');

Route::get('resend/email/verification', "Auth\RegisterController@resend_email_verification")->name('resend.email.verification.submit');
Route::get('resend/mobile/verification', "Auth\RegisterController@resend_mobile_verification")->name('resend.mobile.verification.submit');


// User Routes
Route::middleware(['auth'])->prefix('/user/')->group(function () {

    // Basic info
    Route::get('basic/info/step1', "Auth\RegisterController@basic_info_index")->name('basic.info');
    Route::post('basic/info/step1', "Auth\RegisterController@basic_info_step1")->name('basic.info.step1.submit');
    Route::get('basic/info/step2/index', "Auth\RegisterController@basic_info_step2_index")->name('basic.info.step2.index');
    Route::post('basic/info/step2', "Auth\RegisterController@basic_info_step2")->name('basic.info.step2.submit');
    Route::get('basic/info/step3/index', "Auth\RegisterController@basic_info_step3_index")->name('basic.info.step3.index');
    Route::post('basic/info/step3', "Auth\RegisterController@basic_info_step3")->name('basic.info.step3.submit');

    // Dashboard
    Route::get('dashboard', "HomeController@showDashboard")->name('client.dashboard');
    Route::post('submission', "HomeController@submission")->name('client.submission');

    // Personal Information CRUD
    Route::get('personal/information', "PersonalInformationController@index")->name('personal.information');
    Route::post('personal/information/step1', "PersonalInformationController@personal_information_step1")->name('personal.information.step1.submit');
    Route::post('personal/information/step2', "PersonalInformationController@personal_information_step2")->name('personal.information.step2.submit');
    Route::post('personal/information/step3', "PersonalInformationController@personal_information_step3")->name('personal.information.step3.submit');
    Route::post('personal/information/step4', "PersonalInformationController@personal_information_step4")->name('personal.information.step4.submit');

    // Questionnaire Answer CRUD
    Route::resource('questionnaires/answers', "QuestionnaireAnswerController");

    // English Quiz  CRUD
    Route::resource('english/quizzes', "EnglishQuizController");

    // Code Challenge CRUD
    Route::resource('code/challenges', "CodeChallengeController");
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

//Admin Auth
Route::prefix('admin')->group(function () {
    //Admin Auth
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');


    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});
//Admin Auth + Pages
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    // Admin create
    Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@create')->name('admin.register.submit');

    //Admin Dashboard
    Route::view('/dashboard', "admin.dashboard")->name('admin.dashboard');

    // User CRUD
    Route::resource('/users', "UserController");
    Route::post('users/filter', 'UserController@filter')->name('users.filter');
    Route::get('users/status/{id}', 'UserController@status')->name('users.status');


    Route::get('file-import-export', 'UserController@fileImportExport');
    Route::post('/file-import', 'UserController@fileImport')->name('file-import');
    Route::get('file-export', 'UserController@fileExport')->name('file-export');

    // Notification Crud
    Route::resource('/notifications', "NotificationController");

    // Questionnaire CRUD
    Route::resource('/questionnaires', "QuestionnaireController");

    // Admin CRUD
    Route::resource('/admins', "AdminController");


    //filter
    Route::post('big/filter', [BigbyOrangeController::class, 'filter'])->name('big.filter');
    Route::post('ODC/filter', [ODCController::class, 'filter'])->name('ODC.filter');
    Route::post('fablab/filter', [FablabUsersController::class, 'filter'])->name('fablab.filter');

    // Fablab User
    Route::get('/user/fablab/show/{id}', [FablabUsersController::class, 'show'])->name('admin.user.fablab.show');
    Route::post('/user/fablab/show/{id}/change-status', [FablabUsersController::class, 'changeStatus'])->name('admin.user.fablab.changeUserStatus');

    // BigbyOrange User
    Route::get('/user/big/show/{id}', [BigbyOrangeController::class, 'show'])->name('admin.user.big.show');
    Route::post('/user/big/show/{id}/change-status', [BigbyOrangeController::class, 'changeStatus'])->name('admin.user.big.changeUserStatus');

    // ODC User
    Route::get('/user/odc/show/{id}', [ODCController::class, 'show'])->name('admin.user.odc.show');
    Route::post('/user/odc/show/{id}/change-status', [ODCController::class, 'changeStatus'])->name('admin.user.odc.changeUserStatus');
});


// Coding Academy

Route::get('/codingacademy', "HomeController@publicLanding");

// Fablab Registration Form

Route::get('/fablab-registration', [FablabUsersController::class, 'index']);
Route::post('/fablab-registration', [FablabUsersController::class, 'store'])->name('fablab-registration.store');
Route::get('/admin/{id}/users', [FablabUsersController::class, 'destroy'])->name('fablab_users.delete');

// ODC Registration Form

Route::get('/ODC', [ODCController::class, 'index']);
Route::post('/ODC', [ODCController::class, 'store'])->name('ODC.store');


// Big By Oramge Registration Form

Route::resource('/BigByOrange-registration', "BigbyOrangeController");


Route::get('/thanks', function () {
    return view('public.thanks');
})->name('thanks');

Route::post('/clear-flash-session', function () {
    session()->forget('status');
    session()->forget('error');
});
