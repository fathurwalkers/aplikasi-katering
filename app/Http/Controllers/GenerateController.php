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

class GenerateController extends Controller
{
    public function generate_user()
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 25; $i++) {
            $login_model = new Login;
            // $password = '12345';
            $username = 'user' . $i . strtoupper(Str::random(5));
            $hashPassword = Hash::make($username, [
                'rounds' => 12,
            ]);
            $token_raw = Str::random(16);
            $token = Hash::make($token_raw, [
                'rounds' => 12,
            ]);
            $level = "user";
            $login_status = "verified";
            $login_data = $login_model->create([
                'login_nama'        => $faker->name,
                'login_username'    => $username,
                'login_password'    => $hashPassword,
                'login_email'       => $faker->email,
                'login_telepon'     => $faker->phoneNumber,
                'login_alamat'     => $faker->address,
                'login_token'       => $token,
                'login_level'       => $level,
                'login_status'      => $login_status,
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
            $login_data->save();
        }
        return redirect()->route('daftar-user')->with('status', 'Data User telah berhasil digenerate!');
    }

    public function generate_paket()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 25; $i++) {
            $arr_status = ["TERSEDIA", "KOSONG"];
            $randomStatus = Arr::random($arr_status);
            $paket_kode = 'PAKET-' . strtoupper(Str::random(5));
            $arr_number = [3, 4, 5, 6, 7, 8];
            $randomDigit = Arr::random($arr_number);
            $arr_gambar = [
                "paket1.jpg",
                "paket2.jpg",
                "paket3.jpg",
                "paket4.jpg",
                "paket5.jpg",
                "paket6.jpg",
                "paket7.jpg",
                "paket8.jpg",
                "paket9.jpg",
                "paket10.jpg"
            ];
            $randomGambar = Arr::random($arr_gambar);
            $paket = new Paket;
            $savepaket = $paket->create([
                'paket_nama' => $faker->words($randomDigit, true),
                'paket_gambar' => $randomGambar,
                'paket_harga' => $faker->randomNumber($randomDigit),
                'paket_info' => $faker->paragraph($randomDigit),
                'paket_kode' => $paket_kode,
                'paket_status' => $randomStatus,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $savepaket->save();
        }
        return redirect()->route('daftar-paket')->with('status', 'Data Paket telah berhasil di generate.');
    }

    public function generate_pemesanan()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 4; $i++) {

            $pemesanan_kode = 'PESANAN-' . strtoupper(Str::random(5));
            $arr_number             = [1, 2, 3, 4, 5];
            $arr_status             = ['SELESAI', 'PROSES', 'PENDING'];
            $randomStatus           = Arr::random($arr_status);
            $randomDigit            = Arr::random($arr_number);

            $users                  = Login::where('login_level', 'user')->get()->toArray();
            $randomUsers            = Arr::random($users);
            $idUsers                = intval($randomUsers['id']);

            $paket                  = Paket::all()->toArray();
            $randomPaket            = Arr::random($paket);
            $idPaket                = intval($randomPaket['id']);

            $pemesanan              = new Pemesanan;
            $savePemesanan          = $pemesanan->create([
                'pemesanan_kode'    => $pemesanan_kode,
                'pemesanan_jumlah'  => intval($randomDigit),
                'pemesanan_status'  => $randomStatus,
                'created_at'        => now(),
                'updated_at'        => now()
            ]);

            // dd($savePemesanan);

            $savePemesanan->save();
            $savePemesanan->login()->associate($idUsers);
            $savePemesanan->save();
            $savePemesanan->paket()->associate($idPaket);
            $savePemesanan->save();
        }
        return redirect()->route('daftar-paket');
    }
}
