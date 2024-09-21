<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
// use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['web'])->group(function () {
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::post('/login', [UserController::class, 'login']);
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
