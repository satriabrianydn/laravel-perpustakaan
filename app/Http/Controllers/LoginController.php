<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function mahasiswaDashboard() {
        return 'Ini adalah dashboard mahasiswa';
    }

    public function petugasDashboard() {
        return 'Ini adalah dashboard Petugas';
    }

    public function adminDashboard() {
        return view('admin.index');
    }

    public function processLogin(Request $request) {

        // Validasi Input
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.exists' => 'Email tidak ditemukan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus 8 karakter.',
        ]);

        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            switch (auth()->user()->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'petugas':
                    return redirect()->route('petugas.dashboard');
                case 'mahasiswa':
                    return redirect()->route('mahasiswa.dashboard');
                default:
                    return redirect('/');
            }
        }

        // Jika autentikasi gagal
        return redirect('/login')->with('error', 'Login gagal. Email atau password tidak valid.');
    }

    
}
