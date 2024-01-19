<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        // Cek Pengguna apakah sudah ada session
        if (Auth::check()) {

            $totalUser = User::where('role', '=', 'Mahasiswa')->count();
            $totalBuku = Book::count();

            return view('dashboard.index', [
                'role' => auth()->user()->role,
                'totalUser' => $totalUser,
                'totalBuku' => $totalBuku
            ]);
        }

        // Jika belum login, redirect ke halaman login
        return view('auth.login');
    }


    public function showUser(Request $request)
    {
        $role = 'Mahasiswa';
        $search = $request->input('search');

        $users = User::when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
            ->where('role', $role)
            ->paginate(10);

        return view('user.list', ['users' => $users]);
    }


}
