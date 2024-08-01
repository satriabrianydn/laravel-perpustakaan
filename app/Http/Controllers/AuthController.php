<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    // Controller Register
    public function showRegister()
    {
        // Cek Pengguna apakah sudah ada session
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
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
            'password' => 'required|min:8|confirmed',
        ], [
            'name.required' => 'Nama Lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus 8 karakter.',
            'password.confirmed' => 'Konfirmasi Password tidak sesuai.',
        ]);

        // Simpan data ke database - Tabel users
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Simpan data ke database - Tabel mahasiswa
        Mahasiswa::create([
            'user_id' => $user->id,
            'nim' => null,
            'gender' => null,
            'prodi' => null,
            'kelas' => null,
            'angkatan' => null,
            'no_telp' => null,
            'avatar' => 'default_avatar.jpg',
        ]);

        return redirect()->route('auth.login')->with('success', 'Registrasi berhasil! Silahkan masuk.');
    }

    // Login Controller
    public function showLogin() {
        // Cek Pengguna apakah sudah ada session
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }

        // Jika belum login, tampilkan halaman login
        return view('auth.login');
    }

    public function processLogin(Request $request) {
        // Validasi Input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib di-isi!',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.exists' => 'Email tidak ditemukan.',
            'password.required' => 'Password wajib di-isi!',
        ]);

        if ($validator->fails()) {
            return redirect()->route('auth.login')
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.index');
        }

        return redirect()->route('auth.login')
            ->with('error', 'Login gagal! Email atau password tidak valid.')
            ->withInput();
    }

    public function logout() {

        Auth::logout();

        Alert::success('Sukses', 'Anda telah berhasil logout.');
        return redirect()->route('home.index'); //->with('success', 'Anda telah berhasil logout.');
    }

}
