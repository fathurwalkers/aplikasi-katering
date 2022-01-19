<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class BackController extends Controller
{
    public function index()
    {
        return view('dashboard/index');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function postlogin(Request $request)
    {
        //
    }

    public function postregister(Request $request)
    {
        //
    }
}
