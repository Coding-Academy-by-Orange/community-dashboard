<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Auth::routes();
Route::get('/home', "HomeController@showDashboard")->name('homeDashboard');

// Google login & Register
Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback')->name('login.google.callback');

// Manual Register
Route::get('/', "Auth\RegisterController@index" );
Route::get('/terms', "Auth\RegisterController@terms" );
Route::get('/help', "Auth\RegisterController@help" );


Route::post('register/step1', "Auth\RegisterController@register_step1" )->name('register.step1');
Route::view('/email/verification', "auth.email_verification2" )->name('auth.email.verification2');
Route::post('register/step2', "Auth\RegisterController@register_step2" )->name('register.step2');

// Hard Coded To Skip Email validation
Route::get('register/step2', "Auth\RegisterController@register_step2" )->name('register.step2');

Route::get('resend/email/verification', "Auth\RegisterController@resend_email_verification" )->name('resend.email.verification.submit');
Route::get('resend/mobile/verification', "Auth\RegisterController@resend_mobile_verification" )->name('resend.mobile.verification.submit');


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


    Route::get('file-import-export','UserController@fileImportExport');
    Route::post('/file-import','UserController@fileImport')->name('file-import');
    Route::get('file-export', 'UserController@fileExport')->name('file-export');

    // Notification Crud
    Route::resource('/notifications', "NotificationController");

    // Questionnaire CRUD
    Route::resource('/questionnaires', "QuestionnaireController");

    // Admin CRUD
    Route::resource('/admins', "AdminController");

});



