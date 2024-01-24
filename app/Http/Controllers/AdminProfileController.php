<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function adminShowEdit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function showAddUser(){
    
        return view('user.tambah');
    }

    public function saveUser (Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nim' => 'required|string|max:255',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'prodi' => 'required|string|max:255',
            'no_telp' => 'required|string|max:13',
            'kelas' => 'required|string|max:255',
            'angkatan' => 'required|string|max:255',
            'new_password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Administrator,Petugas,Mahasiswa',
        ],[
            'name.required' => 'Nama Lengkap wajib di isi.',
            'email.required' => 'Email wajib di isi.',
            'email.email' => 'Jenis email tidak valid.',
            'email.unique' => 'Email telah digunakan.',
            'nim.required' => 'NIM wajib di isi.',
            'gender.required' => 'Jenis Kelamin wajib di isi.',
            'prodi.required' => 'Program Studi wajib di isi.',
            'no_telp.required' => 'Nomor Telepon wajib di isi.',
            'kelas.required' => 'Kelas wajib di isi',
            'angkatan.required' => 'Angkatan wajib di isi.',
            'new_password.required' => 'Password wajib di isi.',
            'new_password.confirmed' => 'Konfirmasi Password tidak sesuai.',
            'role.required' => 'Role wajib di isi.'

        ]
    );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->new_password),
            'role' => $request->role,
        ]);

        Mahasiswa::create([
            'user_id' => $user->id,
            'nim' => $request->nim,
            'gender' => $request->gender,
            'prodi' => $request->prodi,
            'kelas' => $request->kelas,
            'angkatan' => $request->angkatan,
            'no_telp' => $request->no_telp,
            'avatar' => 'default_avatar.jpg',
        ]);

        Alert::success('Sukses', 'Data Pengguna berhasil ditambahkan!');
        return redirect()->route('dashboard.user');
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

    // Controller Edit Profil Administrator
    public function showEditAdmin()
    {
        // Ambil data user dan admin
        $user = auth()->user();
        $admin = $user->admin;

        return view('admin.edit', compact('user', 'admin'));
    }

    public function editAdmin(Request $request, $id) {

        $admin = Admin::find($id);
        
        $user = User::find($admin->user_id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'nip' => 'required|string|unique:admin,nip,' . $admin->id,
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'avatar' => 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:5120',
            'no_telp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'old_password' => 'nullable|string|min:8',
            'new_password' => 'nullable|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama wajib di isi.',
            'email.required' => 'Email wajib di isi.',
            'email.email' => 'Jenis Email tidak valid.',
            'email.unique' => 'Email telah digunakan.',
            'nip.required' => 'NIP wajib di isi.',
            'nip.unique' => 'NIP sudah digunakan',
            'gender.required' => 'Jenis Kelamin wajib di isi.',
            'no_telp.required' => 'Nomor Telepon wajib di isi.',
            'alamat.required' => 'Alamat wajib di isi.',
            'new_password.confirmed' => 'Konfirmasi Password tidak sesuai.'
        ]);

        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        
        if ($request->filled('old_password') && !Hash::check($request->input('old_password'), $user->password)) {
            Alert::error('Error', 'Password lama tidak sesuai.');
            return redirect()->route('admin.edit');
        }

        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->input('new_password'));
        }

        $admin = $user->admin;
        $admin->nip = $request->input('nip');
        $admin->alamat = $request->input('alamat');
        $admin->gender = $request->input('gender');
        $admin->no_telp = $request->input('no_telp');

        // Hapus avatar lama jika ada
        if ($request->hasFile('avatar') && $user->admin->avatar && $user->admin->avatar !== 'default_avatar.jpg') {
            Storage::delete('public/avatar/' . $user->admin->avatar);
        }

        // Simpan avatar baru jika ada
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatar', 'public');
            $user->admin->avatar = basename($avatarPath);
        }

        $user->save();
        $admin->save();


        Alert::success('Success', 'Profil berhasil diperbarui!');
        return redirect()->route('admin.edit');
    }
    
}
