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
Route::resource('workout', App\Http\Controllers\WorkoutController::class)->middleware('auth');
Route::resource('routine', App\Http\Controllers\RoutineController::class)->middleware('auth');

Route::get('/inviting_friends', [App\Http\Controllers\InviteFriends::class, 'index'])->middleware('auth')->name('inviting_friends');
Route::post('/inviting_friends/submit', [App\Http\Controllers\InviteFriends::class, 'store'])->middleware('auth');

Route::get('/pending_challenge', [App\Http\Controllers\ChallengeController::class, 'get_pending_challenges'])->middleware('auth')->name('pending_challenge');
Route::post('/respond_challenge', [App\Http\Controllers\ChallengeController::class, 'respond_challenge'])->middleware('auth')->name('accept_reject_challenge');
