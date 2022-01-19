<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;

Route::get('/', function () {
    return redirect('/dashboard');
})->name('home');

// CLIENT
Route::get('/login', [BackController::class, 'login'])->name('login');
Route::get('/register', [BackController::class, 'register'])->name('register');
Route::post('/post-login', [BackController::class, 'post_login'])->name('postlogin');
Route::post('/post-register', [BackController::class, 'post_register'])->name('postregister');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');

// ADMIN

Route::group(['prefix' => '/dashboard', 'middleware' => 'ceklogin'], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');
});
