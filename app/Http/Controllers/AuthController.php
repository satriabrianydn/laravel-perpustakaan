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

        $request->merge(['role' => 'user']);

        // Simpan data ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silahkan masuk.');
    }

    // Login Controller
    public function showLogin() {
        // Cek Pengguna apakah sudah ada session
        if (Auth::check()) {
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
        // Jika belum login, tampilkan halaman login
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

    public function logout() {
        Auth::logout();
    
        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }
}
