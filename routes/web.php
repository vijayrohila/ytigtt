<?php

use App\Http\Controllers\CreatorLinkController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::post('/api/creator-click', [CreatorLinkController::class, 'click'])->name('creator.click');
Route::post('/submit-link', [CreatorLinkController::class, 'submit'])->name('submit.link');

Route::view('/about', 'pages.about')->name('about');
Route::view('/service', 'pages.service')->name('service');
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/advertising-policy', 'pages.advertising-policy')->name('advertising-policy');
Route::view('/acceptable-use-policy', 'pages.acceptable-use-policy')->name('acceptable-use-policy');
Route::view('/community-guidelines', 'pages.community-guidelines')->name('community-guidelines');
Route::view('/founder', 'pages.founder')->name('founder');
