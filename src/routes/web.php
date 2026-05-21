<?php

use App\Http\Controllers\Auth\Dashboard\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/* ---------- WEB ---------- */
Route::get('/', function () {
    return view('home');
});

/* ---------- AUTH ---------- */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/registrar', [RegisterController::class, 'index'])->name('register');
Route::post('/registrar', [RegisterController::class, 'store'])->name('register.store');

/* ---------- PROTECTED ROUTES ---------- */
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::get('/arena', [DashboardController::class, 'index'])->name('dashboard');
});