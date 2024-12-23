<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('fakultas', [FakultasController::class, 'getFakultas'])->middleware(['auth:sanctum','ability:read']);
Route::post('fakultas', [FakultasController::class, 'storeFakultas'])->middleware(['auth:sanctum','ability:create']);
Route::put('fakultas/{id}', [FakultasController::class, 'updateFakultas'])->middleware(['auth:sanctum','ability:update']);

Route::get('prodi', [ProdiController::class, 'getProdi'])->middleware('auth:sanctum');
Route::post('prodi', [ProdiController::class, 'storeProdi']);

Route::get('mahasiswas', [MahasiswaController::class, 'getMahasiswa'])->middleware('auth:sanctum');
Route::post('mahasiswas', [MahasiswaController::class, 'storeMahasiswa']);

Route::delete('fakultas/{id}',[FakultasController::class, 'destroyFakultas']);

Route::post('register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    // Add other protected routes here
});

