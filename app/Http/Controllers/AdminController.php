<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function showDataAdmin(Request $request) {
        $search = $request->input('search');

        $admin = Admin::with('user')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', '%' . $search . '%');
                });
            })
            ->paginate(10);

        return view('admin.index', ['admin' => $admin]);
    }

    public function showAddAdmin()
    {
        return view('admin.tambah');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nip' => 'required|string|unique:admin,nip',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'no_telp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'new_password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Administrator'
        ], [
            'name.required' => 'Nama Petugas wajib di isi.',
            'email.required' => 'Email Petugas wajib di isi.',
            'email.email' => 'Jenis Email tidak valid.',
            'email.unique' => 'Email telah digunakan.',
            'nip.required' => 'NIP wajib di isi.',
            'nip.unique' => 'NIP sudah digunakan',
            'gender.required' => 'Jenis Kelamin wajib di isi.',
            'no_telp.required' => 'Nomor Telepon wajib di isi.',
            'alamat_petugas.required' => 'Alamat wajib di isi.',
            'new_password.required' => 'Password wajib di isi.',
            'new_password.confirmed' => 'Konfirmasi Password tidak sesuai.',
            'role.required' => 'Role wajib di isi.'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->new_password),
            'role' => $request->role
        ]);

        Admin::create([
            'user_id' => $user->id,
            'nip' => $request->nip,
            'gender' => $request->gender,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'avatar' => 'default_avatar.jpg'
        ]);

        Alert::success('Sukses', 'Data Admin berhasil ditambahkan!');
        return redirect()->route('dashboard.admin');
    }

    public function deleteAdmin($id)
    {
        // Temukan petugas berdasarkan ID
        $admin = Admin::find($id);

        // Jika petugas tidak ditemukan, kembalikan response
        if (!$admin) {
            Alert::error('Error', 'Admin Tidak Ditemukan!');
            return redirect()->route('dashboard.admin');
        }

        // Temukan pengguna terkait
        $user = User::find($admin->user_id);

        // Jika pengguna tidak ditemukan, kembalikan respons dengan not found
        if (!$user) {
            Alert::error('Error', 'Pengguna Tidak Ditemukan!');
            return redirect()->route('dashboard.admin');
        }

        try {
            // Hapus terlebih dahulu petugas
            $admin->delete();

            // Hapus pengguna setelahnya
            $user->delete();

            // Tampilkan pesan sukses
            Alert::success('Sukses', 'Data Admin berhasil dihapus!');
        } catch (\Exception $e) {
            // Tangani kesalahan dan tampilkan pesan gagal
            Alert::error('Error', 'Gagal menghapus data Admin.');
        }

        return redirect()->route('dashboard.admin');
    }

    
}
