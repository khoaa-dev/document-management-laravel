<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index() {
        // Session::forget('canBo');
        return view('home');
    }

    public function loginView() {
        return view('auth.login');
    }
}
