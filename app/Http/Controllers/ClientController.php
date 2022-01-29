<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
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
}