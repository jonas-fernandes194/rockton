<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::get('/registrar', [RegisterController::class, 'index'])->name('register.index');
Route::post('/registrar', [RegisterController::class, 'store'])->name('register.store');