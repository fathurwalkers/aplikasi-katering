<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return redirect()->route('login-admin');
});

// CLIENT
Route::get('/login', [BackController::class, 'login'])->name('login');
Route::get('/login-admin', [BackController::class, 'login_admin'])->name('login-admin');
Route::get('/register', [BackController::class, 'register'])->name('register');
Route::post('/post-login', [BackController::class, 'postlogin'])->name('postlogin');
Route::post('/post-register', [BackController::class, 'postregister'])->name('postregister');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');
Route::get('/daftar-paket', [ClientController::class, 'daftar_paket'])->name('daftar-paket');
Route::get('/detail-paket/{id}', [ClientController::class, 'detail_paket'])->name('detail-paket');
Route::get('/pemesanan/{id}', [ClientController::class, 'pemesanan'])->name('pemesanan');
Route::group(['prefix' => '/client', 'middleware' => 'ceklogin'], function () {
    Route::get('/', [ClientController::class, 'index'])->name('dashboard');
});

// ADMIN
Route::group(['prefix' => '/admin', 'middleware' => 'ceklogin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/daftar-paket', [AdminController::class, 'daftar_paket'])->name('daftar-paket');
    Route::get('/tambah-paket', [AdminController::class, 'tambah_paket'])->name('tambah-paket');
});

