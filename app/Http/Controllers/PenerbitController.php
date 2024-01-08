<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenerbitController extends Controller
{
    public function showDataPenerbit(Request $request)
    {
        $search = $request->input('search');

        $penerbit = Penerbit::orderBy('id');

        // Logika pencarian
        if ($search) {
            $penerbit->where('nama_penerbit', 'like', '%' . $search . '%');
        }

        $penerbit = $penerbit->paginate(10);

        return view('penerbit.index', compact('penerbit', 'search'));
    }

    public function addPenerbit()
    {
        return view('penerbit.tambah');
    }

    public function processAddPenerbit(Request $request)
    {
        $request->validate([
            'nama_penerbit' => 'required|string|max:255',
            'email_penerbit' => 'required|string|max:255',
            'alamat_penerbit' => 'required|string|max:255'
        ],
            [
                'nama_penerbit.required' => 'Nama Penerbit wajib di isi',
                'email_penerbit.required' => 'Email Penerbit wajib di isi',
                'alamat_penerbit.required' => 'Alamat penerbit wajib di isi'
            ]);

        $penerbit = Penerbit::create([
            'nama_penerbit' => $request->nama_penerbit,
            'email_penerbit' => $request->email_penerbit,
            'alamat_penerbit' => $request->alamat_penerbit
        ]);

        Alert::success('Sukses', 'Penerbit berhasil ditambahkan!');
        return redirect()->route('dashboard.penerbit');
    }

    public function showEditPenerbit($id) {
        $penerbit = Penerbit::find($id);
    
        if (!$penerbit) {
            Alert::error('Error', 'Data Penerbit tidak ditemukan.');
        }
    
        return view('penerbit.edit', compact('penerbit'));
    }

    public function editPenerbit(Request $request, $id)
    {
        $penerbit = Penerbit::find($id);

        
        $penerbit->update([
            'nama_penerbit' => $request->nama_penerbit,
            'email_penerbit' => $request->email_penerbit,
            'alamat_penerbit' => $request->alamat_penerbit
        ]);

        Alert::success('Sukses', 'Data penerbit berhasil diupdate!');
        return redirect()->route('dashboard.penerbit');
    }

    public function deletePenerbit($id) {
        $penerbit = Penerbit::find($id);


    $penerbit->delete();

    Alert::success('Sukses', 'Data penerbit berhasil dihapus!');
    return redirect()->route('dashboard.penerbit');
    }

}
