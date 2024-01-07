<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminProfileController extends Controller
{
    public function adminShowEdit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function adminUpdateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $mahasiswa = $user->mahasiswa;

        // Validasi data formulir
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|in:Administrator,Petugas,Mahasiswa',
            'no_telp' => 'nullable|string|max:20',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'nim' => 'required|string|max:20',
            'prodi' => 'required|string|max:255',
            'kelas' => 'required|string|max:20',
            'angkatan' => 'required|string|max:4',
        ], [
            'name.required' => 'Nama Wajib Di isi',
            'role.required' => 'Jenis Role Wajib Di isi',
            'gender.required' => 'Jenis Kelamin Wajib Di isi',
            'nim.required' => 'NIM Wajib Di isi',
            'prodi.required' => 'Program Studi Wajib Di isi',
            'kelas.required' => 'Kelas Wajib Di isi',
            'angkatan.required' => 'Angkatan Wajib Di isi',
        ]
        );

        // Update data user
        $user->update([
            'name' => $request->input('name'),
            'role' => $request->input('role')
        ]);

        // Update data mahasiswa
        $mahasiswa->update([
            'no_telp' => $request->input('no_telp'),
            'gender' => $request->input('gender'),
            'nim' => $request->input('nim'),
            'prodi' => $request->input('prodi'),
            'kelas' => $request->input('kelas'),
            'angkatan' => $request->input('angkatan'),
        ]);

        Alert::success('Sukses', 'Data User berhasil diupdate!');

        return redirect()->route('admin.edit.profile', $id);
    }

    public function adminDeleteUser($id)
    {
        $user = User::findOrFail($id);


        if ($user->mahasiswa) {
            $user->mahasiswa->delete();
        }

        // Hapus foto avatar jika ada
        $avatarPath = 'public/avatar/' . optional($user->mahasiswa)->avatar;
        if ($avatarPath !== 'public/avatar/default_avatar.jpg' && Storage::exists($avatarPath)) {
            Storage::delete($avatarPath);
        }

        // Hapus data user (delete permanen)
        $user->delete();

        Alert::success('Sukses', 'Data User berhasil dihapus!');

        return redirect()->route('dashboard.user');
    }
}
