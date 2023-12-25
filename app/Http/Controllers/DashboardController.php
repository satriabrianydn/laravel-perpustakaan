<?php

namespace App\Http\Controllers;

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
}
