<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PaketController;

Route::get('/', function () {
    return view('landing-page');
})->name('landing-page');

// Generate Data
Route::get('/generate-user', [GenerateController::class, 'generate_user'])->name('generate-user');
Route::get('/generate-paket', [GenerateController::class, 'generate_paket'])->name('generate-paket');
Route::get('/generate-pemesanan', [GenerateController::class, 'generate_pemesanan'])->name('generate-pemesanan');

Route::get('/chained-generate', [GenerateController::class, 'chained_generate'])->name('chained-generate');

// CLIENT
Route::get('/login', [BackController::class, 'login'])->name('login');
Route::get('/login-admin', [BackController::class, 'login_admin'])->name('login-admin');
Route::get('/register', [BackController::class, 'register'])->name('register');
Route::post('/post-login', [BackController::class, 'postlogin'])->name('postlogin');
Route::post('/post-register', [BackController::class, 'postregister'])->name('postregister');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');
Route::get('/daftar-paket', [ClientController::class, 'daftar_paket'])->name('client-daftar-paket');
Route::get('/detail-paket/{id}', [ClientController::class, 'detail_paket'])->name('client-detail-paket');
Route::get('/pemesanan/{id}', [ClientController::class, 'pemesanan'])->name('pemesanan');

Route::group(['prefix' => '/client', 'middleware' => 'ceklogin'], function () {
    Route::get('/', [ClientController::class, 'index'])->name('dashboard');
});

// ADMIN
Route::group(['prefix' => '/admin', 'middleware' => 'cekloginadmin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    // Paket
    Route::get('/daftar-paket', [PaketController::class, 'daftar_paket'])->name('daftar-paket');
    Route::get('/tambah-paket', [PaketController::class, 'tambah_paket'])->name('tambah-paket');
    Route::post('/paket/hapus/{id}', [PaketController::class, 'hapus_paket'])->name('hapus-paket');

    // Pemesanan
    Route::get('/daftar-pemesanan', [PemesananController::class, 'daftar_pemesanan'])->name('daftar-pemesanan');

    // Pengguna (User)
    Route::get('/daftar-user', [AdminController::class, 'daftar_user'])->name('daftar-user');
    Route::post('/user/hapus/{id}', [AdminController::class, 'hapus_user'])->name('hapus-user');
});

