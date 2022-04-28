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

class ClientController extends Controller
{

    public function index()
    {
        $users = session('data_login');
        $level_user = $users->login_level;
        if ($level_user == 'admin') {
            return redirect()->route('admin');
        }
        return view('client.index');
    }

    public function client_batalkan_pesanan(Request $request, $id)
    {
        $pesanan = Pemesanan::findOrFail($id);
        $update_pesanan = $pesanan->update([
            'pemesanan_status' => 'PENDING',
            'updated_at' => now(),
        ]);
        return redirect()->route('client-daftar-pesanan')->with('status', 'Permintaan pembatalan pesanan anda sedang di proses.');
    }

    public function client_daftar_pesanan()
    {
        $users = session('data_login');
        $pesanan = Pemesanan::where('login_id', $users->id)->latest()->paginate(10);
        return view('client.daftar-pesanan', [
            'users' => $users,
            'pesanan' => $pesanan,
        ]);
    }

    public function daftar_paket()
    {
        $users = session('data_login');
        $paket = Paket::latest()->paginate(10);
        return view('client.daftar-paket', [
            'paket' => $paket,
            'users' => $users
        ]);
    }

    public function detail_paket(Request $request, $id)
    {
        $users = session('data_login');
        $paket = Paket::where('id', $id)->first();
        if ($paket == NULL) {
            return redirect()->route('client-daftar-paket')->with('status', 'Maaf, paket yang anda pilih tidak tersedia.');
        }
        return view('client.detail-paket', [
            'paket' => $paket,
            'users' => $users
        ]);
    }

    public function pemesanan($id)
    {
        $users = session('data_login');

        if ($users == null) {
            return redirect()->route('login')->with('status', 'Silahkan melakukan login dahulu sebelum memesan paket. ');
        }

        $paket_id = $id;
        $paket = Paket::where('id', $paket_id)->firstOrFail();

        if ($paket == null) {
            return redirect()->route('daftar-paket')->with('status', 'Paket yang anda inginkan tidak tersedia. ');
        } else {
            if ($paket->paket_status == "KOSONG") {
                return redirect()->route('client-daftar-paket')->with('status', 'Maaf, paket yang anda pilih sedang kosong, silahkan memilih paket lain.');
            }
            return view('client.pemesanan', [
                'paket' => $paket,
                'users' => $users
            ]);
        }
    }

    public function towhatsapp($id)
    {
        $pemesanan_id = $id;
        $pemesanan = Pemesanan::where('id', $pemesanan_id)->orderBy('created_at', 'ASC')->firstOrFail();
        $login = Login::where('id', $pemesanan->login_id)->firstOrFail();
        $paket = Paket::where('id', $pemesanan->paket_id)->firstOrFail();

        return view('client.towhatsapp', [
            'pemesanan' => $pemesanan,
            'login' => $login,
            'paket' => $paket
        ]);
    }

    public function save_pemesanan(Request $request, $id)
    {
        $users              = session('data_login');
        $paket_id           = $id;
        if ($users == null) {
            return redirect()->route('login')->with('status', 'Silahkan melakukan login dahulu sebelum memesan paket. ');
        }

        $pengguna           = Login::where('id', $users->id)->firstOrFail();
        $paket              = Paket::where('id', $paket_id)->firstOrFail();

        $pemesanan          = new Pemesanan;

        $kode1              = "PESANAN-";
        $kode2              = Str::random(5);
        $pemesanan_kode     = $kode1 . $kode2;

        $save_pemesanan = $pemesanan->create([
            'pemesanan_kode' => strtoupper($pemesanan_kode),
            'pemesanan_jumlah' => 1,
            'pemesanan_status' => "PROSES",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $save_pemesanan->save();
        $save_pemesanan->login()->associate($pengguna->id);
        $save_pemesanan->save();
        $save_pemesanan->paket()->associate($paket->id);
        $save_pemesanan->save();

        return $this->towhatsapp($save_pemesanan->id);
    }
}
