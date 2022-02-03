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

class AdminController extends Controller
{
    public function index()
    {
        $users = session('data_login');
        $level_user = $users->login_level;
        if ($level_user == 'admin') {
            return view('admin.index');
        } else {
            return redirect()->route('login-admin')->with('status', 'Hanya administrator yang dapat login');
        }
    }

    public function daftar_user()
    {
        $pengguna = Login::where('login_level', 'user')->get();
        return view('admin.daftar-user', [
            'pengguna' => $pengguna
        ]);
    }

    public function hapus_user($id)
    {
        $user_id = $id;
        $findUser = Login::findOrFail($user_id);
        $findUser->forceDelete();
        return redirect()->route('daftar-user')->with('status', 'Data User telah berhasil di hapus.');
    }

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
}
