<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Penerbit;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BookController extends Controller
{
    public function showBook(Request $request)
    {
        $search = $request->input('search');
        $books = Book::orderBy('id');

        if ($search) {
            $books->where('nama_buku', 'like', '%' . $search . '%');
        }

        $books = $books->paginate(10);

        return view('buku.index', compact('books'));
    }

    public function createBook()
    {
        $penerbits = Penerbit::all();
        $kategori = Kategori::all();
        return view('buku.tambah', compact('penerbits', 'kategori'));
    }

    public function storeBook(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required|string|max:255',
            'nama_buku' => 'required|string|max:255',
            'id_kategori' => 'nullable|exists:kategori,id',
            'id_penerbit' => 'nullable|exists:penerbit,id',
            'tanggal_terbit' => 'required|date',
            'jumlah_halaman' => 'required|string|max:255',
            'nama_pengarang' => 'required|string|max:255',
            'foto_buku' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required|max:255'
        ],
        [
            'kode_buku.required' => 'Kode Buku wajib di isi',
            'nama_buku.required' => 'Nama Buku wajib di isi',
            'tanggal_terbit.required' => 'Tanggal Terbit wajib di isi',
            'jumlah_halaman.required' => 'Jumlah Halaman wajib di isi',
            'nama_pengarang.required' => 'Nama Pengarang wajib di isi',
            'deskripsi.required' => 'Deskripsi wajib di isi'
        ]
    );

        $data = $request->all();

        if ($request->hasFile('foto_buku')) {
            $image = $request->file('foto_buku');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('covers', $imageName, 'public');
            $data['foto_buku'] = $path;
        }

        Book::create($data);

        Alert::success('Sukses', 'Buku berhasil ditambahkan!');
        return redirect()->route('dashboard.buku');
    }

    public function edit(Book $book)
    {
        $penerbits = Penerbit::all();
        $kategori = Kategori::all();
        return view('buku.edit', compact('book', 'penerbits', 'kategori'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'kode_buku' => 'required|string|max:255',
            'nama_buku' => 'required|string|max:255',
            'id_kategori' => 'nullable|exists:kategori,id',
            'id_penerbit' => 'nullable|exists:penerbit,id',
            'tanggal_terbit' => 'required|date',
            'jumlah_halaman' => 'required|string|max:255',
            'nama_pengarang' => 'required|string|max:255',
            'foto_buku' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_buku')) {
            $image = $request->file('foto_buku');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['foto_buku'] = $imageName;
        }

        $book->update($data);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return redirect()->route('dashboard.buku')->with('error', 'Buku tidak ditemukan.');
        }

        if ($book->foto_buku) {
            Storage::delete('public/' . $book->foto_buku);
        }

        $book->delete();

        Alert::success('Sukses', 'Buku berhasil dihapus!');
        
        return redirect()->route('dashboard.buku');
    }
}
