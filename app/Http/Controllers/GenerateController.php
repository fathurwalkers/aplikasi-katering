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
}
