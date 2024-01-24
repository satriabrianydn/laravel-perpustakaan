<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('index');
    }

    public function showCategoryHORROR() {
         $horrorCategoryId = Kategori::where('kategori', 'Horror')->value('id');
         $books = Book::where('id_kategori', $horrorCategoryId)->get();
         return view('category.horror', ['books' => $books]);
    }

    public function showCategoryFIKSI() {
        $fiksiCategoryId = Kategori::where('kategori', 'fiksi')->value('id');
        $books = Book::where('id_kategori', $fiksiCategoryId)->get();
        return view('category.fiksi', ['books' => $books]);
    }

    public function showCategoryCERPEN() {
        $cerpenCategoryId = Kategori::where('kategori', 'cerpen')->value('id');
        $books = Book::where('id_kategori', $cerpenCategoryId)->get();
        return view('category.cerpen', ['books' => $books]);
    }

    public function showCategoryNONFIKSI() {
        $nonfiksiCategoryId = Kategori::where('kategori', 'nonfiksi')->value('id');
        $books = Book::where('id_kategori', $nonfiksiCategoryId)->get();
        return view('category.nonfiksi', ['books' => $books]);
    }

    public function showCategoryPUISI() {
        $puisiKategoriId = Kategori::where('kategori', 'puisi')->value('id');
        $books = Book::where('id_kategori', $puisiKategoriId)->get();
        return view('category.puisi', ['books' => $books]);
    }

    public function showCategoryEkonomi() {
        $ekonomikategori_id = Kategori::where('kategori', 'ekonomi')->value('id');
        $books = Book::where('id_kategori', $ekonomikategori_id)->get();
        return view('category.ekonomi', ['books' => $books]);
    }

    public function showCategoryMatematika() {
        $matematikakateogori = Kategori::where('kategori', 'matematika')->value('id');
        $books = Book::where('id_kategori', $matematikakateogori)->get();
        return view('category.matematika', ['books' => $books]);
    }

    public function showCategoryFisika() {
        $fisikacategory = Kategori::where('kategori', 'fisika')->value('id');
        $books = Book::where('id_kategori', $fisikacategory)->get();
        return view('category.fisika', ['books' => $books]);
    }

    public function showCategorySejarah() {
        $sejarahkategori = kategori::where('kategori', 'sejarah')->value('id');
        $books = Book::where('id_kategori', $sejarahkategori)->get();
        return view('category.sejarah', ['books' => $books]);
    }

    public function showCategoryAgamaIslam() {
        $agamakategori = kategori::where('kategori', 'agama')->value('id');
        $books = Book::where('id_kategori', $agamakategori)->get();
        return view('category.agama_islam', ['books' => $books]);
    }

    public function showCategoryBiologi() {
        $biologikategori = kategori::where('kategori', 'biologi')->value('id');
        $books = Book::where('id_kategori', $biologikategori)->get();
        return view('category.biologi', ['books' => $books]);
    }

    public function showCategoryTeknologi() {
        $teknologikategori = kategori::where('kategori', 'teknologi')->value('id');
        $books = Book::where('id_kategori', $teknologikategori)->get();
        return view('category.teknologi', ['books' => $books]);
    }

    public function showCategoryInggris() {
        $inggriskategori = kategori::where('kategori', 'inggris')->value('id');
        $books = Book::where('id_kategori', $inggriskategori)->get();
        return view('category.inggris', ['books' => $books]);
    }
}
