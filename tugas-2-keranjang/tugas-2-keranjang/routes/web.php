<?php

use App\Http\Controllers\KeranjangController;
use Illuminate\Support\Facades\Route;

Route::get('/', [KeranjangController::class, 'index']);
Route::get('/keranjang', [KeranjangController::class, 'lihat']);

Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah']);
Route::post('/keranjang/kurang/{id}', [KeranjangController::class, 'kurang']);
Route::post('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus']);
Route::post('/keranjang/kosongkan', [KeranjangController::class, 'kosongkan']);