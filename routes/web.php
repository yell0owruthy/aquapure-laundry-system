<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('login'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Khusus Admin: CRUD Data Layanan
    Route::middleware('role:admin')->group(function () {
        Route::resource('layanan', LayananController::class)->except(['show']);
    });

    // Admin & Kasir: Transaksi & Rekap Laundry
    Route::middleware('role:admin,kasir')->group(function () {
        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
        Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
        Route::get('/transaksi/{transaksi}/struk', [TransaksiController::class, 'struk'])->name('transaksi.struk');
        Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
        Route::patch('/transaksi/{transaksi}/selesai', [TransaksiController::class, 'selesai'])->name('transaksi.selesai');
        Route::delete('/transaksi/{transaksi}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
        
    });
});