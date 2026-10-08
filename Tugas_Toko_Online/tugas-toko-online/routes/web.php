<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BarangController::class, 'index']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/keranjang', [KeranjangController::class, 'lihat']);
    Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah']);
    Route::post('/keranjang/kurang/{id}', [KeranjangController::class, 'kurang']);
    Route::post('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus']);
    Route::post('/checkout', [KeranjangController::class, 'checkout']);

    Route::get('/pesanan', [PesananController::class, 'index']);
});