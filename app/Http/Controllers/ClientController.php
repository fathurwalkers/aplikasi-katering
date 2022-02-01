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

    public function daftar_paket()
    {
        $paket = Paket::all();
        return view('client.daftar-paket', [
            'paket' => $paket
        ]);
    }

    public function detail_paket(Request $request, $id)
    {
        return view('client.detail-paket');
    }

    public function pemesanan($id)
    {
        return view('client.pemesanan');
    }
}
