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
        // $paket = Paket::paginate(10);
        $paket = Paket::paginate(10);
        return view('client.daftar-paket', [
            'paket' => $paket
        ]);
    }

    public function detail_paket(Request $request, $id)
    {
        $paket = Paket::where('id', $id)->first();
        if ($paket == NULL) {
            return redirect()->route('client-daftar-paket')->with('status', 'Maaf, paket yang anda pilih tidak tersedia.');
        }
        return view('client.detail-paket', [
            'paket' => $paket
        ]);
    }

    public function pemesanan($id)
    {
        $users = session('data_login');

        if ($users == null) {
            return redirect()->route('daftar-paket')->with('status', 'Silahkan melakukan login dahulu sebelum memesan paket. ');
        }

        $paket_id = $id;
        $paket = Paket::where('id', $paket_id)->firstOrFail();
        if ($paket == null) {
            return redirect()->route('daftar-paket')->with('status', 'Paket yang anda inginkan tidak tersedia. ');
        } else {
            return view('client.pemesanan', [
                'paket' => $paket
            ]);
        }
    }
}
