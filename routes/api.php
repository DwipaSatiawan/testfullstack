<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\API\BukuController;
use App\Http\Controllers\API\KategoriController;
use App\Http\Controllers\API\PengarangController;

Route::prefix('buku')->group(function () {
    Route::post('/', [BukuController::class, 'store']);
    Route::put('/{id}', [BukuController::class, 'update']);
    Route::delete('/{id}', [BukuController::class, 'destroy']);
});

Route::prefix('kategori')->group(function () {
    Route::post('/', [KategoriController::class, 'store']);
    Route::put('/{id}', [KategoriController::class, 'update']);
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});

Route::prefix('pengarang')->group(function () {
    Route::post('/', [PengarangController::class, 'store']);
    Route::put('/{id}', [PengarangController::class, 'update']);
    Route::delete('/{id}', [PengarangController::class, 'destroy']);
});
