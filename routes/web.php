<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ==== PUBLIC ROUTES ====

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// ==== PRIVATE ROUTES ====

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('challenge', App\Http\Controllers\ChallengeController::class)->middleware('auth');
Route::get('/inviting_friends', [App\Http\Controllers\InviteFriends::class, 'index'])->middleware('auth')->name('inviting_friends');
