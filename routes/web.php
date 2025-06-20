<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MusicoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/arena', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('arena/musico/', [MusicoController::class, 'index'])->name('musico.index');
    Route::get('arena/musico/criar', [MusicoController::class, 'create'])->name('musico.create');

    Route::post('arena/musico/store', [MusicoController::class, 'store'])->name('musico.store');
});

require __DIR__.'/auth.php';
