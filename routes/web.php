<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// PUBLIC ROUTES

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// PRIVATE ROUTES

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
