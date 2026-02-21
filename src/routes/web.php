<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/musico', [MemberController::class, 'index'])->name('dashboard.member');
    Route::get('/dashboard/musico/cadastrar', [MemberController::class, 'create'])->name('dashboard.member.create');
    Route::post('/dashboard/musico/cadastrar', [MemberController::class, 'store'])->name('dashboard.member.store');
    Route::get('/dashboard/musico/editar/{member}', [MemberController::class, 'edit'])->name('dashboard.member.edit');
    Route::put('/dashboard/musico/editar/{member}', [MemberController::class, 'update'])->name('dashboard.member.update');
    Route::delete('/dashboard/musico/deletar/{member}', [MemberController::class, 'destroy'])->name('dashboard.member.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
