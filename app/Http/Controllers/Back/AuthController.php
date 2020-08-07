<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login()
    {
        return view('back.auth.login');
    }

    public function login_post(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            toastr()->success('Tekrardan Hosgeldiniz ' . Auth::user()->name);
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->withErrors('Email veya sifre hatalidir');
        }
    }

    public function logout()
    {
        Auth::logout();
        toastr()->success('Cikis Basarili.');
        return redirect()->route('admin.login');
    }
}
