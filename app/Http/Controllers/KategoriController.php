<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function addKategori()
    {
        return view('kategori.tambah');
    }

    public function processKategori(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
        ], [
            'kategori.required' => 'Nama Kategori wajib di isi'
        ]);

        Kategori::create([
            'kategori' => $request->kategori
        ]);

        Alert::success('Sukses', 'Kategori berhasil ditambahkan!');
        return redirect()->route('dashboard.kategori');
    }

    public function deleteKategori($id)
    {
        $kategori = Kategori::find($id);


        $kategori->delete();

        Alert::success('Sukses', 'Data kategori berhasil dihapus!');
        return redirect()->route('dashboard.kategori');
    }
}
