<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'show'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard')->middleware('auth');

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('register')->middleware('guest');
    Route::post('/register', 'store')->name('auth.store')->middleware('guest');
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate')->name('authenticate')->middleware('guest');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});