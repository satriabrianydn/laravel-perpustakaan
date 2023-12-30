<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function showProfile()
    {
        // Ambil data user dan mahasiswa
        $user = auth()->user();
        $mahasiswa = $user->mahasiswa;

        return view('dashboard.edit', compact('user', 'mahasiswa'));
    }

    public function updateProfile(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'sometimes|nullable|email',
            'nim' => 'sometimes|nullable|string',
            'prodi' => 'sometimes|nullable|string',
            'kelas' => 'sometimes|nullable|string',
            'angkatan' => 'sometimes|nullable|string',
            'avatar' => 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:2048',
            'old_password' => 'sometimes|nullable|string',
            'new_password' => 'sometimes|nullable|string|min:8|confirmed',
        ]);

        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('old_password') && !Hash::check($request->input('old_password'), $user->password)) {
            Alert::error('Error', 'Password lama tidak sesuai.');
            return redirect()->route('dashboard.profile');
        }

        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->input('new_password'));
        }
        

        $user->save();

        // Lakukan pembaruan data mahasiswa
        $mahasiswa = $user->mahasiswa;
        $mahasiswa->nim = $request->input('nim');
        $mahasiswa->prodi = $request->input('prodi');
        $mahasiswa->kelas = $request->input('kelas');
        $mahasiswa->angkatan = $request->input('angkatan');
        $mahasiswa->save();

        // Update Avatar
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('public/avatars');
            $mahasiswa->avatar = basename($avatarPath);
            $mahasiswa->save();
        }

        // Tampilkan pesan SweetAlert setelah pembaruan berhasil
        Alert::success('Success', 'Profil berhasil diperbarui!');

        // Redirect kembali ke halaman profil
        return redirect()->route('dashboard.profile');
    }
}
