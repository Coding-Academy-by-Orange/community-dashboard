<?php

use App\Http\Controllers\Big\BigbyOrangeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ODC\ODCController;
use App\Http\Controllers\Activity\ActivityController;
use App\Http\Controllers\Activity\ActivityRegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Fablab\FablabUsersController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CodingSchool\CodingSchoolController;
use App\Http\Controllers\CodingAcademy\PersonalInformationController;
use App\Http\Controllers\CodingAcademy\ControllerCodingAcademy;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [ActivityController::class, 'index']);

Route::get('/activity/show/{id}', [ActivityController::class, 'show'])->name('show');
// activity registration routes
Route::get('/activity/register/{activity_id}', [ActivityController::class, 'create'])->name('activity.register');
Route::post('/activity/register', [ActivityController::class, 'store'])->name('activity.register.store');


Route::get('/test', function () {
    return view('test');
});
Route::post('/test', [TestController::class, 'store'])->name('test.store');


Auth::routes();


Route::get('/home', [HomeController::class, 'showDashboard'])->name('homeDashboard');

// Manual Register
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/terms', [RegisterController::class, 'terms']);
Route::get('/help', [RegisterController::class, 'help']);

// Google login & Register
Route::get('/login/google', [LoginController::class, 'redirectToProvider'])->name('login.google');
Route::get('/login/google/callback', [LoginController::class, 'handleProviderCallback'])->name('login.google.callback');

Route::post('register/step1', [RegisterController::class, 'register_step1'])->name('register.step1');
Route::post('register/step2', [RegisterController::class, 'register_step2'])->name('register.step2');
Route::view('/email/verification', "auth.email_verification2")->name('auth.email.verification2');

// Hard Coded To Skip Email validation 
//Route::get('register/step2',[RegisterController::class, 'register_step2'] )->name('register.step2');

Route::get('resend/email/verification', [RegisterController::class, 'resend_email_verification'])->name('resend.email.verification.submit');
Route::get('resend/mobile/verification', [RegisterController::class, 'resend_mobile_verification'])->name('resend.mobile.verification.submit');




// User Routes
Route::middleware(['auth'])->prefix('/user/')->group(function () {

    // Basic info
    Route::get('basic/info/step1', [RegisterController::class, 'basic_info_index'])->name('basic.info');
    Route::POST('basic/info/step1', [RegisterController::class, 'basic_info_step1'])->name('basic.info.step1.submit');
    Route::get('basic/info/step2/index', [RegisterController::class, 'basic_info_step2_index'])->name('basic.info.step2.index');
    Route::POST('basic/info/step2', [RegisterController::class, 'basic_info_step2'])->name('basic.info.step2.submit');
    Route::get('basic/info/step3/index', [RegisterController::class, 'basic_info_step3_index'])->name('basic.info.step3.index');
    Route::POST('basic/info/step3', [RegisterController::class, 'basic_info_step3'])->name('basic.info.step3.submit');

    // Dashboard
    Route::get('dashboard', [HomeController::class, 'showDashboard'])->name('client.dashboard');
    Route::post('submission', [HomeController::class, 'submission'])->name('client.submission');

    // Personal Information CRUD
    Route::get('personal/information', [PersonalInformationController::class, 'index'])->name('personal.information');
    Route::post('personal/information/step1', [PersonalInformationController::class, 'personal_information_step1'])->name('personal.information.step1.submit');
    Route::post('personal/information/step2', [PersonalInformationController::class, 'personal_information_step2'])->name('personal.information.step2.submit');
    Route::post('personal/information/step3', [PersonalInformationController::class, 'personal_information_step3'])->name('personal.information.step3.submit');
    Route::post('personal/information/step4', [PersonalInformationController::class, 'personal_information_step4'])->name('personal.information.step4.submit');

    // Questionnaire Answer CRUD
    Route::resource('questionnaires/answers', "CodingAcademy/QuestionnaireAnswerController");

    // English Quiz  CRUD
    Route::resource('english/quizzes', "CodingAcademy/EnglishQuizController");

    // Code Challenge CRUD
    Route::resource('code/challenges', "CodingAcademy/CodeChallengeController");
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

//Admin Auth
Route::prefix('admin')->group(function () {
    //Admin Auth
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});
//Admin Auth + Pages
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    // Admin create
    Route::get('/register', [AdminRegisterController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminRegisterController::class, 'create'])->name('admin.register.submit');

    //Admin Dashboard
    //Route::view('/dashboard', "admin.dashboard")->name('admin.dashboard');

    // Route for initial filter
    Route::get('/dashboard', [FilterController::class, 'initialFilter'])->name('admin.dashboard');

    // Route for the main filter method
    Route::get('/dashboard/filtered', [FilterController::class, 'filterResults'])->name('dashboard.filter');


    // User CRUD
    Route::resource('/users', "UserController");
    Route::post('users/filter', [UserController::class, 'filter'])->name('users.filter');
    Route::get('users/status/{id}', [UserController::class, 'status'])->name('users.status');


    // Route::get('file-import-export', [UserController::class, 'fileImportExport']);
    // Route::post('/file-import', [UserController::class, 'fileImport'])->name('file-import');
    Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');

    // Notification Crud
    Route::resource('/notifications', "CodingAcademy\NotificationController");

    // Questionnaire CRUD
    Route::resource('/questionnaires', "CodingAcademy\QuestionnaireController");

    // Admin CRUD
    Route::resource('/admins', "AdminController");

    //activity CRUD
    // Create (Show create form and Store data)
    Route::get('/activity/create', [ActivityController::class, 'create'])->name('activity.create');
    Route::post('/activity', [ActivityController::class, 'store'])->name('activity.store');

    // Read (Show all activities and a single activity)
    Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');
    Route::get('/activity/{id}', [ActivityController::class, 'show'])->name('activity.show');

    // Update (Show edit form and Update data)
    Route::get('/activity/{id}/edit', [ActivityController::class, 'edit'])->name('activity.edit');
    Route::put('/activity/{id}', [ActivityController::class, 'update'])->name('activity.update');

    // Delete (Delete data)
    Route::delete('/activity/{id}', [ActivityController::class, 'destroy'])->name('activity.destroy');

    // activity registration routes
    Route::get('/register/create/{activity_id}', [ActivityRegisterController::class, 'create'])->name('admin.activity.register.create');
    Route::post('/register/create', [ActivityRegisterController::class, 'store'])->name('admin.activity.register.store');
    Route::get('/register/index/{activity_id}', [ActivityRegisterController::class, 'index'])->name('admin.activity.register.index');
    Route::delete('/activity/register/{id}', [ActivityRegisterController::class, 'destroy'])->name('admin.activity.register.destroy');

    //filter
    Route::post('big/filter', [BigbyOrangeController::class, 'filter'])->name('big.filter');
    Route::post('ODC/filter', [ODCController::class, 'filter'])->name('ODC.filter');
    Route::post('fablab/filter', [FablabUsersController::class, 'filter'])->name('fablab.filter');

    // Fablab User
    Route::get('/user/fablab/show/{id}', [FablabUsersController::class, 'show'])->name('admin.user.fablab.show');
    Route::post('/user/fablab/show/{id}/change-status', [FablabUsersController::class, 'changeStatus'])->name('admin.user.fablab.changeStatus');

    // Coding School User
    Route::get('/user/codingschool/show/{id}', [CodingSchoolController::class, 'show'])->name('admin.user.codingschool.show');
    Route::post('/user/codingschool/show/{id}/change-status', [CodingSchoolController::class, 'changeStatus'])->name('admin.user.codingschool.changeStatus');

    // Coding academy User
    Route::get('/user/codingacademy/show/{id}', [ControllerCodingAcademy::class, 'show'])->name('admin.user.codingacademy.show');
    Route::post('/user/codingacademy/show/{id}/change-status', [ControllerCodingAcademy::class, 'changeStatus'])->name('admin.user.codingacademy.changeStatus');

    // BigbyOrange User
    Route::get('/user/big/show/{id}', [BigbyOrangeController::class, 'show'])->name('admin.user.big.show');
    Route::post('/user/big/show/{id}/change-status', [BigbyOrangeController::class, 'changeStatus'])->name('admin.user.big.changeStatus');

    // ODC User
    Route::get('/user/odc/show/{id}', [ODCController::class, 'show'])->name('admin.user.odc.show');
    Route::post('/user/odc/show/{id}/change-status', [ODCController::class, 'changeStatus'])->name('admin.user.odc.changeStatus');

    Route::resource('/location', "LocationController");
    Route::post('/getLocation', [LocationController::class, 'getLocation']);
});


// Coding Academy
Route::get('/codingacademy', [ControllerCodingAcademy::class, 'index']);
Route::get('/codingacademy/create', [ControllerCodingAcademy::class, 'create'])->name('codingacademy.create');


// Fablab Registration Form
Route::resource('/fablab', 'Fablab\FablabUsersController')->except('destroy');
Route::get('/admin/{id}/users', [FablabUsersController::class, 'destroy'])->name('fablab_users.delete');

// ODC Registration Form
Route::resource('/ODC', "ODC\ODCController");


// Coding school
Route::resource('/codingschool', "CodingSchool\CodingSchoolController");

// Big By Orange Registration Form
Route::resource('/BigByOrange', "Big\BigbyOrangeController");

//invoation-hub
Route::get('/invoation-hub', function () {
    return view('invoation-hub.landing-page');
});
Route::get('/invoation-hub/book-tour', function () {
    return view('invoation-hub.book-tour');
});
Route::get('/invoation-hub/workshops/register', function () {
    return view('invoation-hub.wokshops');
});
Route::get('/invoation-hub/program/register', function () {
    return view('invoation-hub.faq');
});


Route::get('/thanks', function () {
    return view('public.thanks');
})->name('thanks');

Route::post('/clear-flash-session', function () {
    session()->forget('status');
    session()->forget('error');
});
