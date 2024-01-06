<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function showDataPenerbit(Request $request) {
        $search = $request->input('search');

        $penerbit = Penerbit::orderBy('id');

        // Logika pencarian
        if ($search) {
            $penerbit->where('nama_penerbit', 'like', '%' . $search . '%');
        }

        $penerbit = $penerbit->paginate(10);

        return view('penerbit.index', compact('penerbit', 'search'));
    }


}
