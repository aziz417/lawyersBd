<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('search/register/test/{key}', [RegistrationController::class, 'searchRegisterTest'])->name('search.registerTest');

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
