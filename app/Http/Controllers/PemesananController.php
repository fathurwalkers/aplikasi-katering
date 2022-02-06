<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Paket;
use App\Models\Pemesanan;

class PemesananController extends Controller
{
    public function daftar_pemesanan()
    {
        $pemesanan = Pemesanan::all();
        return view('admin.daftar-pemesanan', [
            'pemesanan' => $pemesanan
        ]);
    }
}
