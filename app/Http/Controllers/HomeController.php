<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('index');
    }

    public function showCategoryHORROR() {
        return view('category.horror');
    }

    public function showCategoryFIKSI() {
        return view('category.fiksi');
    }

    public function showCategoryCERPEN() {
        return view('category.cerpen');
    }

    public function showCategoryNONFIKSI() {
        return view('category.nonfiksi');
    }

    public function showCategoryPUISI() {
        return view('category.puisi');
    }

    public function showCategoryEkonomi() {
        return view('category.ekonomi');
    }

    public function showCategoryMatematika() {
        return view('category.matematika');
    }

    public function showCategoryFisika() {
        return view('category.fisika');
    }

    public function showCategorySejarah() {
        return view('category.sejarah');
    }

    public function showCategoryAgamaIslam() {
        return view('category.agama_islam');
    }

    public function showCategoryBiologi() {
        return view('category.biologi');
    }

    public function showCategoryTeknologi() {
        return view('category.teknologi');
    }

    public function showCategoryInggris() {
        return view('category.inggris');
    }
}
