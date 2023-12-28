<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function showBook()
    {
        $books = Book::paginate(10);
        return view('dashboard.buku', compact('books'));
    }

    public function create()
    {
        $penerbits = Penerbit::all();
        return view('dashboard.books.create', compact('penerbits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required|string|max:255',
            'nama_buku' => 'required|string|max:255',
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

        Book::create($data);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Book $book)
    {
        $penerbits = Penerbit::all();
        return view('dashboard.books.edit', compact('book', 'penerbits'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'kode_buku' => 'required|string|max:255',
            'nama_buku' => 'required|string|max:255',
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

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
