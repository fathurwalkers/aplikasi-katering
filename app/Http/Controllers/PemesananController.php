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

    public function hapus_pemesanan($id)
    {
        $pemesanan_id = $id;
        $findpemesanan = Pemesanan::findOrFail($pemesanan_id);
        $nama_pemesanan = $findpemesanan->pemesanan_nama;
        $findpemesanan->forceDelete();
        $alert = "Data Pemesanan ";
        $alert .= $nama_pemesanan;
        $alert .= " telah berhasil dihapus!";
        return redirect()->route('daftar-pemesanan')->with('status', $alert);
    }
}
