<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard() {
        // Cek Pengguna apakah sudah ada session
        if (Auth::check()) {
            return view('dashboard.index', ['role' => auth()->user()->role]);
        }

        // Jika belum login, redirect ke halaman login
        return view('auth.login');
    }

    public function showBook () {
        return view('dashboard.buku');
    }

    public function showUser() {
        $users = User::paginate(10);
        return view('user.list', ['users' => $users]);
    }
}
