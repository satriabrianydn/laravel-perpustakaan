<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function showKategori(Request $request)
    {

        $search = $request->input('search');

    $kategori = Kategori::orderBy('id');

    // Logika pencarian
    $kategori->when($search, function ($query) use ($search) {
        return $query->where('kategori', 'like', '%' . $search . '%');
    });

    $kategori = $kategori->withCount('buku')->paginate(10);

    return view('kategori.index', compact('kategori'));
    }
}
