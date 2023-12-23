<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Controller Register
    public function showRegister()
    {
        // Cek Pengguna apakah sudah ada session
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        // Jika belum login, tampilkan halaman register
        return view('auth.register');
    }

    public function processRegister(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ], [
            'name.required' => 'Nama Lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus 8 karakter.',
        ]);

        // Simpan data ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Atur role ke default 'user'
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silahkan masuk.');
    }

    // Login Controller
    public function showLogin() {
        // Cek Pengguna apakah sudah ada session
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        // Jika belum login, tampilkan halaman login
        return view('auth.login');
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
            return redirect()->route('dashboard');
        }

        // Jika autentikasi gagal
        return redirect('/login')->with('error', 'Login gagal. Email atau password tidak valid.');
    }

    public function logout() {
        Auth::logout();
    
        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }

    public function dashboard() {
        // Cek Pengguna apakah sudah ada session
        if (Auth::check()) {
            return view('dashboard.index', ['role' => auth()->user()->role]);
        }

        // Jika belum login, redirect ke halaman login
        return redirect('/login');
    }
}