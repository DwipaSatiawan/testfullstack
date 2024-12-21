<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\BukuController;

Route::get('/', [BukuController::class, 'index']);
Route::get('/buku', [BukuController::class, 'index']);
Route::post('/buku_save', [BukuController::class, 'store']);
Route::get('/buku_get_edit/{id}', [BukuController::class, 'show']);
Route::post('/buku_update', [BukuController::class, 'update']);
Route::delete('/buku_delete/{id}', [BukuController::class, 'delete']);

Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori_save', [KategoriController::class, 'store']);
Route::get('/kategori_get_edit/{id}', [KategoriController::class, 'show']);
Route::post('/kategori_update', [KategoriController::class, 'update']);
Route::delete('/kategori_delete/{id}', [KategoriController::class, 'delete']);

Route::get('/pengarang', [PengarangController::class, 'index']);
Route::post('/pengarang_save', [PengarangController::class, 'store']);
Route::get('/pengarang_get_edit/{id}', [PengarangController::class, 'show']);
Route::post('/pengarang_update', [PengarangController::class, 'update']);
Route::delete('/pengarang_delete/{id}', [PengarangController::class, 'delete']);