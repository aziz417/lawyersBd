<?php

use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\ReplyController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SlidersController;
use App\Http\Controllers\Backend\SocialController;
use App\Http\Controllers\Backend\BoardController;
use App\Http\Controllers\Backend\CaseController;
use App\Http\Controllers\Backend\CaseTypeController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\InstituteController;
use App\Http\Controllers\Backend\RateController;
use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\SubjectController;
use App\Http\Controllers\frontend\CasesController;
use App\Http\Controllers\frontend\LawyerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['register' => false]);
// frontend home
Route::get('/', [HomeController::class, 'frontend'])->name('frontend.home');
// show registration form
Route::get('/registration/{type}', [RegistrationController::class, 'registration'])->name('registration');
Route::get('select/items', [RegistrationController::class, 'selectItems'])->name('select.items');

Route::resource('registrations', RegistrationController::class);
Route::get('register/update/{id}', [RegistrationController::class, 'edit'])->name('register.update');
Route::get('draft/store', [RegistrationController::class, 'draftStore'])->name('draft.store');
Route::get('draft/update', [RegistrationController::class, 'draftUpdate'])->name('draft.update');


Route::get('lawyer/list', [LawyerController::class, 'lawyerList'])->name('lawyer.list');
Route::get('lawyer/details/{id}', [LawyerController::class, 'lawyer'])->name('lawyer.details');
Route::post('submit/rate', [LawyerController::class, 'rateSubmit'])->name('submit.rate');
Route::get('why/choose-online-service', function (){
    return view('frontend.pages.WhyChooseOnlineService');
})->name('why-choose-online-service');

Route::get('/case/create', [CasesController::class, 'create'])->name('case.create');

// message controller
Route::resource('messages', App\Http\Controllers\MessageController::class);

Route::group(['middleware' => ['auth']], function (){
    Route::get('/home', [HomeController::class, 'frontend'])->name('home');
//    Route::get('search/register/{register?}', [RegistrationController::class, 'searchRegister'])->name('search.register');
    Route::get('search/register/{register?}', [RegistrationController::class, 'searchRegister'])->name('search.register');
    Route::get('experience/delete', [RegistrationController::class, 'deleteExperience'])->name('experience.delete');
    Route::get('register/search', [RegistrationController::class, 'registerSearchAutocomplete'])->name('register.search.autocomplete');
    Route::post('case/store', [CasesController::class, 'CaseStore'])->name('case.store');
    Route::get('pdf/{key}', function ($key){
        $register = \App\Registration::with('experiences')->where('national_id', $key)->orWhere('mobile_number', $key)
            ->orWhere('ssc_registration_no', $key)->orWhere('hsc_registration_no', $key)->first();
        if ($register){
            $pdf = PDF::loadView('view_pdf', compact('register'));
            return $pdf->stream('register.pdf');
        }else{
            return redirect('registration/form')->with('warningMsg', 'Register Not Found');
        }
    })->name('pdf.view');
    Route::get('show/rating/system', [RateController::class, 'rateShow'])->name('rate.show');
    Route::get('rating/update', [RateController::class, 'ratingCalculation'])->name('rating.calculation');

    /******************************* Start => Message sections *********************************/
    Route::resource('messages', App\Http\Controllers\Backend\MessageController::class)->only(['index', 'show', 'destroy']);
    /******************************* End => Message sections *********************************/
    /******************************* Start => Message sections *********************************/
    Route::resource('replies', ReplyController::class);
    Route::get("message-replies/{message}", [ReplyController::class, 'messageReplies'])->name('message.replies');
    /******************************* End => Message sections *********************************/

    /******************************* Start => Admin Profile sections *********************************/
    Route::get('/profile', [UserProfileController::class, 'profile'])->name('profile');
    Route::PATCH('/profile/{user}/update', [UserProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::PATCH('/password/change', [UserProfileController::class, 'changePassword'])->name('password.change');
    /******************************* End => Admin Profile sections *********************************/
});


// admin section router
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function (){

    Route::get('dashboard', [HomeController::class, 'index'])->name('admin');
//    Route::get('/', [HomeController::class, 'index'])->name('admin');
    Route::resource('boards', BoardController::class)->except(['show']);
    Route::resource('institutes', InstituteController::class)->except(['show']);
    Route::resource('subjects', SubjectController::class)->except(['show']);
    Route::resource('sections', SectionController::class)->except(['show']);
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('caseTypes', CaseTypeController::class)->except(['show']);
    Route::get('case/manage', [CaseController::class, 'caseManage'])->name('case.manage');
    Route::get('case/status/update', [CaseController::class, 'caseStatusUpdate'])->name('case.status.update');
    Route::get('case/{id}/details', [CaseController::class, 'caseDetails'])->name('case.details');
    Route::get('all/clients', [ClientController::class, 'index'])->name('client.index');
    /************* slider sections *************/
    Route::resource('sliders', SlidersController::class)->except( 'show');
    Route::get('sliders/change-status/{slider}', [SlidersController::class, 'changeStatus'])
        ->name('sliders.status.change');
    /*******site setting controller*******/
    Route::resource('settings', SettingController::class);
    Route::get('settings/change-status/{setting}', [SettingController::class, 'changeStatus'])
        ->name('settings.status.change');

    /*************social sections*************/
    Route::resource('socials', SocialController::class);
    Route::get('socials/change-status/{social}', [SocialController::class, 'changeStatus'])
        ->name('socials.status.change');
});




