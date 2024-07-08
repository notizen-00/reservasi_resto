<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PelangganAuthController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

// Rute untuk halaman login dan registrasi
Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('pelanggan/login', [PelangganAuthController::class, 'showLoginForm'])->name('pelanggan.login.form');
Route::post('pelanggan/login', [PelangganAuthController::class, 'login'])->name('pelanggan.login');
Route::post('pelanggan/register', [PelangganAuthController::class, 'register'])->name('pelanggan.register');

// Grup middleware auth untuk rute yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/simpan', [CartController::class, 'simpan'])->name('cart.simpan');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{rowId}', [CartController::class, 'destroy'])->name('cart.destroy');
    // Tambahkan rute lain yang memerlukan autentikasi di sini
});

// Rute untuk logout
Route::post('pelanggan/logout', [PelangganAuthController::class, 'logout'])->name('pelanggan.logout');

// Rute lain di luar middleware auth...
