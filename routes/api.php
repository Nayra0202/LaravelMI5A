<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('fakultas', [FakultasController::class, 'getFakultas']);
Route::get('prodi', [ProdiController::class, 'getProdi']);
Route::get('mahasiswas', [MahasiswaController::class, 'getMahasiswa']);

Route::post('fakultas', [FakultasController::class, 'storeFakultas']);
Route::post('prodi', [ProdiController::class, 'storeProdi']);

Route::delete('fakultas/{id}',[FakultasController::class, 'destroyFakultas']);

Route::post('register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    // Add other protected routes here
});
