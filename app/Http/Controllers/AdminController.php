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
        $findBidan = Login::findOrFail($user_id);
        $findBidan->forceDelete();
        return redirect()->route('daftar-user')->with('status', 'Data User telah di hapus.');
    }

    public function daftar_paket()
    {
        return view('admin.daftar-paket');
    }

    public function tambah_paket()
    {
        return view('admin.tambah-paket');
    }
}
