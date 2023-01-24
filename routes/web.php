<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ==== PUBLIC ROUTES ====

Route::get('/', [App\Http\Controllers\Controller::class, 'landing']);

Auth::routes();

// ==== PRIVATE ROUTES ====

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('challenge', App\Http\Controllers\ChallengeController::class);
Route::resource('workout', App\Http\Controllers\WorkoutController::class);
Route::resource('routine', App\Http\Controllers\RoutineController::class);

Route::get('/inviting_friends', [App\Http\Controllers\InviteFriends::class, 'index'])->name('inviting_friends');
Route::post('/inviting_friends/submit', [App\Http\Controllers\InviteFriends::class, 'store']);

Route::get('/pending_challenge', [App\Http\Controllers\ChallengeController::class, 'get_pending_challenges'])->name('pending_challenge');
Route::post('/respond_challenge', [App\Http\Controllers\ChallengeController::class, 'respond_challenge'])->name('accept_reject_challenge');
