<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PetugasController extends Controller
{
    public function showPetugas(Request $request)
    {
        $role = 'Petugas';
        $search = $request->input('search');

        $petugas = User::when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
            ->where('role', $role)
            ->paginate(10);

        return view('petugas.index', ['petugas' => $petugas]);
    }
}
