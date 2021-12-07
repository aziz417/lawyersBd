<?php

use App\Http\Controllers\Backend\BoardController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\InstituteController;
use App\Http\Controllers\Backend\RateController;
use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\SubjectController;
use App\Http\Controllers\frontend\CasesController;
use App\Http\Controllers\frontend\LawyerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
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

Route::get('case/or/gd', function (){
    return view('frontend.pages.CaseOrGd');
})->name('case.or.gd');


Route::group(['middleware' => ['auth']], function (){
    Route::get('/test', [HomeController::class, 'frontend'])->name('home');


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
            //$applyForm->setIsRemoteEnabled('isRemoteEnabled', true);
            //$applyForm = new Dompdf($applyForm);
            //$profileImage =  asset('uploads/applications/'.$applyForm->profile_photo_one);
            return $pdf->stream('register.pdf');
        }else{
            return redirect('registration/form')->with('warningMsg', 'Register Not Found');
        }
    })->name('pdf.view');

    Route::get('show/rating/system', [RateController::class, 'rateShow'])->name('rate.show');
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
});




