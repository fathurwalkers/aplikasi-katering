<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
