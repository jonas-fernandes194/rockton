<?php

use App\Http\Controllers\BandaController;
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
    Route::get('arena/musico/editar/{id}', [MusicoController::class, 'edit'])->name('musico.edit');
    Route::post('arena/musico/salvar', [MusicoController::class, 'store'])->name('musico.store');
    Route::put('arena/musico/atualizar/{id}', [MusicoController::class, 'update'])->name('musico.update');
    Route::post('/musico/delete', [MusicoController::class, 'destroy'])->name('musico.destroy');

    Route::get('arena/banda/', [BandaController::class, 'index'])->name('banda.index');
    Route::get('arena/banda/criar', [BandaController::class, 'create'])->name('banda.create');
    Route::get('arena/banda/editar/{id}', [BandaController::class, 'edit'])->name('banda.edit');
    Route::post('arena/banda/salvar', [BandaController::class, 'store'])->name('banda.store');
});

require __DIR__.'/auth.php';
