<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('client.daftar-paket');
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
