<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.loginnew');
});

Route::get('/dashboard', [DashboardController::class, 'index']) ->name
('dashboard')->middleware (['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('fakultas',FakultasController::class)->middleware(['auth','verified']);
Route::resource('prodi',ProdiController::class)->middleware(['auth','verified']);
Route::resource('mahasiswas',MahasiswaController::class)->middleware(['auth','verified']);

require __DIR__.'/auth.php';
