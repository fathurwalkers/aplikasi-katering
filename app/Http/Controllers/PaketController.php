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
use Symfony\Component\HttpKernel\Event\RequestEvent;

class PaketController extends Controller
{
    public function daftar_paket()
    {
        $users = session('data_login');
        $user_level = $users->login_level;

        if($user_level == 'user') {
            return redirect()->route('dashboard');
        }

        $paket = Paket::all();
        return view('admin.daftar-paket', [
            'paket' => $paket
        ]);
    }

    public function tambah_paket()
    {
        return view('admin.tambah-paket');
    }

    public function post_tambah_paket(Request $request)
    {
        $paket = new Paket;
        $gambar_cek = $request->file('paket_gambar');
        if (!$gambar_cek) {
            $gambar = null;
        } else {
            $randomNamaGambar = Str::random(6) . '.jpg';
            $gambar = $request->file('paket_gambar')->move(public_path('tampilan/img'), strtolower($randomNamaGambar));
        }

        $paket_kode = "PAKET-" . strtoupper(Str::random(5));
        $paket_harga = intval($request->paket_harga);
        $paket_info = $request->paket_info;
        $paket_status = $request->paket_status;

        $save_paket = $paket->create([
            'paket_nama' => $request->paket_nama,
            'paket_gambar' => $gambar,
            'paket_harga' => $paket_harga,
            'paket_info' => $paket_info,
            'paket_kode' => $paket_kode,
            'paket_status' => $paket_status,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $save_paket->save();
        return redirect()->route('daftar-paket')->with('status', 'Berhasil menambah paket baru.');
    }

    public function hapus_paket($id)
    {
        $paket_id = $id;
        $findPaket = Paket::findOrFail($paket_id);
        $nama_paket = $findPaket->paket_nama;
        $findPaket->forceDelete();
        $alert = "Data Paket ";
        $alert .= $nama_paket;
        $alert .= " telah berhasil dihapus!";
        return redirect()->route('daftar-paket')->with('status', $alert);
    }

    public function update_paket(Request $request, $id)
    {
        $paket_id = $id;
        $paket = Paket::where('id', $paket_id)->first();

        $gambar_cek = $request->file('paket_gambar');
        if (!$gambar_cek) {
            $gambar = $paket->paket_gambar;
        } else {
            $randomNamaGambar = Str::random(6) . '.jpg';
            $gambar = $request->file('paket_gambar')->move(public_path('tampilan/img'), strtolower($randomNamaGambar));
        }

        if ($paket == null) {
            return redirect()->route('daftar-paket')->with('status', 'Maaf, paket yang anda ingin ubah tidak dapat ditemukan. ');
        } else {
            $paket->update([
                'paket_nama' => $request->paket_nama,
                'paket_gambar' => $gambar,
                'paket_harga' => $request->paket_harga,
                'paket_info' => $request->paket_info,
                'paket_kode' => $paket->paket_kode,
                'paket_status' => $request->paket_status,
                'updated_at' => now()
            ]);
            return redirect()->route('daftar-paket')->with('status', 'Data Paket telah di ubah. ');
        }
    }
}
