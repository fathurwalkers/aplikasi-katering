<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PaketController;
use App\Models\Paket;
use Illuminate\Support\Arr;

Route::get('/', function () {
    // return view('landing-page');
    return redirect()->route('admin');
// })->name('landing-page');
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
Route::post('/pemesanan/proses/{id}', [ClientController::class, 'save_pemesanan'])->name('save-pemesanan');
Route::post('/pemesanan/batalkan/{id}', [ClientController::class, 'client_batalkan_pesanan'])->name('client-batalkan-pesanan');

Route::get('/client', function () {
    $users = session('data_login');
    $var_paket = Paket::all()->toArray();
    $paket1 = Arr::random($var_paket);
    $paket2 = Arr::random($var_paket);
    $paket3 = Arr::random($var_paket);
    if ($users == null) {
        return view('landing-page', [
            'paket1' => $paket1,
            'paket2' => $paket2,
            'paket3' => $paket3,
            'users' => $users
        ]);
    } else {
        return view('landing-page', [
            'paket1' => $paket1,
            'paket2' => $paket2,
            'paket3' => $paket3,
            'users' => $users
        ]);
    }
    // return redirect()->route('admin');
// })->name('landing-page');
})->name('user-page');

Route::group(['prefix' => '/client/auth', 'middleware' => 'ceklogin'], function () {
    Route::get('/', [ClientController::class, 'index'])->name('dashboard');
    Route::get('/daftar-pesanan', [ClientController::class, 'client_daftar_pesanan'])->name('client-daftar-pesanan');
    Route::get('/towhatsapp', [ClientController::class, 'towhatsapp'])->name('towhatsapp');
});

// ADMIN
Route::group(['prefix' => '/admin', 'middleware' => 'cekloginadmin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    // Paket
    Route::get('/daftar-paket', [PaketController::class, 'daftar_paket'])->name('daftar-paket');
    Route::get('/tambah-paket', [PaketController::class, 'tambah_paket'])->name('tambah-paket');
    Route::post('/post-tambah-paket', [PaketController::class, 'post_tambah_paket'])->name('post-tambah-paket');
    Route::post('/paket/hapus/{id}', [PaketController::class, 'hapus_paket'])->name('hapus-paket');
    Route::post('/paket/update/{id}', [PaketController::class, 'update_paket'])->name('update-paket');

    // Pemesanan
    Route::get('/daftar-pemesanan', [PemesananController::class, 'daftar_pemesanan'])->name('daftar-pemesanan');
    Route::post('/pemesanan/hapus/{id}', [PemesananController::class, 'hapus_pemesanan'])->name('hapus-pemesanan');
    Route::post('/pemesanan/batalkan/{id}', [PemesananController::class, 'admin_batalkan_pesanan'])->name('admin-batalkan-pesanan');
    Route::post('/pemesanan/konfirmasi/{id}', [PemesananController::class, 'admin_konfirmasi_pesanan'])->name('admin-konfirmasi-pesanan');
    Route::post('/pemesanan/selesaikan/{id}', [PemesananController::class, 'admin_selesaikan_pesanan'])->name('admin-selesaikan-pesanan');

    // Pengguna (User)
    Route::get('/daftar-user', [AdminController::class, 'daftar_user'])->name('daftar-user');
    Route::post('/user/hapus/{id}', [AdminController::class, 'hapus_user'])->name('hapus-user');
});

