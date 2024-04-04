<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ContactUsPageController;
use App\Http\Controllers\FaqPageController;
use App\Http\Controllers\PrivacyPageController;
use App\Http\Controllers\TermsPageController;

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
Route::get('/', [HomePageController::class, 'fetchHomeFaq']);

// Contact Us
Route::get('contact',[ContactUsPageController::class, 'index']);
Route::post('contact_us', [ContactUsPageController::class, 'storeContactForm'])->name('contact_us');

// Faq
Route::get('faq', [FaqPageController::class, 'fetchFaqs']);

// Privacy Page
Route::get('privacy', [PrivacyPageController::class, 'fetchPrivacy']);

// Terms Page
Route::get('terms', [TermsPageController::class, 'fetchTerms']);