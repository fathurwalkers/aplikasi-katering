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
use Symfony\Component\HttpFoundation\RateLimiter\RequestRateLimiterInterface;

class PemesananController extends Controller
{
    public function daftar_pemesanan()
    {
        $pemesanan = Pemesanan::all();
        return view('admin.daftar-pemesanan', [
            'pemesanan' => $pemesanan
        ]);
    }

    public function admin_konfirmasi_pesanan(Request $request, $id)
    {
        $pesanan = Pemesanan::findOrFail($id);
        $update_pesanan = $pesanan->update([
            'pemesanan_status' => 'BERLANGSUNG',
            'updated_at' => now(),
        ]);
        return redirect()->route('daftar-pemesanan')->with('status', 'Pesanan telah dikonfirmasi.');
    }

    public function admin_batalkan_pesanan(Request $request, $id)
    {
        $pesanan = Pemesanan::findOrFail($id);
        $update_pesanan = $pesanan->update([
            'pemesanan_status' => 'DIBATALKAN',
            'updated_at' => now(),
        ]);
        return redirect()->route('daftar-pemesanan')->with('status', 'Pesanan telah dibatalkan.');
    }

    public function admin_selesaikan_pesanan(Request $request, $id)
    {
        $pesanan = Pemesanan::findOrFail($id);
        $update_pesanan = $pesanan->update([
            'pemesanan_status' => 'SELESAI',
            'updated_at' => now(),
        ]);
        return redirect()->route('daftar-pemesanan')->with('status', 'Pesanan telah selesai.');
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
