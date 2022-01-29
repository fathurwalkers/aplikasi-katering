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

    public function pemesanan()
    {
        echo "<marquee><h1><img src='https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1511314480/ixomjefh9nstuooioykq.jpg'></h1></marquee>";
    }
}
