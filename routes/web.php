<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\TermsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/', 'frontend/home/index');

Route::get("contact",[ContactUsController::class,'index']);
Route::view('contact', 'frontend/contact/index');
Route::post('contact_us', "ContactUsController@storeContactForm")->name('contact_us');

Route::view('faq', 'frontend/faq/index');

// Privacy Page
Route::get('privacy', [PrivacyController::class, 'fetchAndDisplayPrivacy']);

// Terms Page
Route::get('terms', [TermsController::class, 'fetchAndDisplayTerms']);