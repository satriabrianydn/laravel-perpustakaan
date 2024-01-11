<?php

namespace App\Http\Controllers;


use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PetugasController extends Controller
{
    public function showPetugas(Request $request)
    {
    // $role = 'Petugas';
    $search = $request->input('search');

    $petugas = Petugas::with('user')
        ->when($search, function ($query) use ($search) {
            $query->whereHas('user', function ($userQuery) use ($search) {
                $userQuery->where('name', 'like', '%' . $search . '%');
            });
        })
        ->paginate(10);

    return view('petugas.index', ['petugas' => $petugas]);
    }

    public function showAddPetugas() {
        return view('petugas.tambah');
    }

    public function storePetugas(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nip' => 'required|string',
            'no_telp' => 'required|string|max:15',
            'alamat_petugas' => 'required|string|max:255',
            'new_password' => 'required|string|min:8|confirmed'
        ],[
            'name.required' => 'Nama Petugas wajib di isi.',
            'email.required' => 'Email Petugas wajib di isi.',
            'email.email' => 'Jenis Email tidak valid.',
            'email.unique' => 'Email telah digunakan.',
            'nip.required' => 'NIP wajib di isi.',
            'no_telp.required' => 'Nomor Telepon wajib di isi.',
            'alamat_petugas.required' => 'Alamat wajib di isi.',
            'new_password.required' => 'Password wajib di isi.',
            'new_password.confirmed' => 'Konfirmasi Password tidak sesuai.'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->new_password),
            'role' => 'Petugas'
        ]);

        Petugas::create([
            'user_id' => $user->id,
            'nip' => $request->nip,
            'no_telp' => $request->no_telp,
            'alamat_petugas' => $request->alamat_petugas,
            'avatar' => 'default_avatar.jpg'
        ]);

        Alert::success('Sukses', 'Data Petugas berhasil ditambahkan!');
        return redirect()->route('dashboard.petugas');
    }

    public function showUpdatePetugas ($id) {
        $petugas = Petugas::find($id);
        $user = User::find($petugas->user_id);
        return view('petugas.edit', compact('petugas', 'user'));
    }

    public function deletePetugas($id)
    {
        // Temukan petugas berdasarkan ID
        $petugas = Petugas::find($id);

        // Jika petugas tidak ditemukan
        if (!$petugas) {
            Alert::error('Error', 'Data Petugas tidak ditemukan!');
            return redirect()->route('dashboard.petugas');
        }

        // Temukan pengguna terkait
        $user = User::find($petugas->user_id);

        // Jika pengguna tidak ditemukan
        if (!$user) {
            Alert::error('Error', 'Data User tidak ditemukan!');
            return redirect()->route('dashboard.petugas');
        }

        try {
            // Hapus terlebih dahulu petugas
            $petugas->delete();

            // Hapus pengguna setelahnya
            $user->delete();

            // Tampilkan pesan sukses
            Alert::success('Sukses', 'Data Petugas berhasil dihapus!');
        } catch (\Exception $e) {
            // Tangani kesalahan dan tampilkan pesan gagal
            Alert::error('Error', 'Gagal menghapus data Petugas.');
        }

        return redirect()->route('dashboard.petugas');
    }
}
