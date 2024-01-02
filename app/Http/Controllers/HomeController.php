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


}
