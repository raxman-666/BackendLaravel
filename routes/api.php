<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\BukuController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('mahasiswa', [MahasiswaController::class, 'index']);
Route::get('mahasiswa/{id}', [MahasiswaController::class, 'search']);
Route::post('mahasiswa', [MahasiswaController::class, 'store']);
Route::patch('mahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('mahasiswa/{id}', [MahasiswaController::class, 'destroy']);

Route::get('buku', [BukuController::class, 'index']);
Route::get('buku/{id}', [BukuController::class, 'search']);
Route::post('buku', [BukuController::class, 'store']);
Route::patch('buku/{id}', [BukuController::class, 'update']);
Route::delete('buku/{id}', [BukuController::class, 'destroy']);

Route::get('jurusan', [JurusanController::class, 'index']);
