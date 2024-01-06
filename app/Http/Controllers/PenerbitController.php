<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function showDataPenerbit() {
        $penerbit = Penerbit::orderBy('id')->paginate(10);
        return view('penerbit.index', compact('penerbit'));
    }

    
}
