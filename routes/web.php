<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
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



Route::get('/', [HomeController::class, 'fetchHome']);

// Contact Us
Route::get('contact',[ContactUsController::class, 'index']);
Route::post('contact', [ContactUsController::class, 'storeContactForm'])->name('contact');

// Faq
Route::get('faq', [FaqController::class, 'fetchFaq']);

// Privacy Page
Route::get('privacy', [PrivacyController::class, 'fetchPrivacy']);

// Terms Page
Route::get('terms', [TermsController::class, 'fetchTerms']);