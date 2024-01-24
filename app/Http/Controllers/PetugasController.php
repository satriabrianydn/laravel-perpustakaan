<?php

namespace App\Http\Controllers;


use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PetugasController extends Controller
{
    public function showPetugas(Request $request)
    {

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

    public function showAddPetugas()
    {
        return view('petugas.tambah');
    }

    public function storePetugas(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nip' => 'required|string|unique:petugas,nip',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'no_telp' => 'nullable|string|max:15',
            'alamat_petugas' => 'nullable|string|max:255',
            'new_password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Administrator,Petugas'
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
            'role' => 'Role wajib di isi.'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->new_password),
            'role' => $request->role
        ]);

        Petugas::create([
            'user_id' => $user->id,
            'nip' => $request->nip,
            'gender' => $request->gender,
            'no_telp' => $request->no_telp,
            'alamat_petugas' => $request->alamat_petugas,
            'avatar' => 'default_avatar.jpg'
        ]);

        Alert::success('Sukses', 'Data Petugas berhasil ditambahkan!');
        return redirect()->route('dashboard.petugas');
    }

    public function showUpdatePetugas($id)
    {
        $petugas = Petugas::find($id);
        $user = User::find($petugas->user_id);
        return view('petugas.edit', compact('petugas', 'user'));
    }

    public function processUpdatePetugas(Request $request, $id)
    {
        $petugas = Petugas::find($id);

        if (!$petugas) {
            Alert::error('Error', 'Data Petugas tidak ditemukan!');
            return redirect()->route('dashboard.petugas');
        }

        $user = User::find($petugas->user_id);

        if (!$user) {
            Alert::error('Error', 'Data User tidak ditemukan!');
            return redirect()->route('dashboard.petugas');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'nip' => 'sometimes|string|unique:petugas,nip,' . $petugas->id,
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'no_telp' => 'nullable|string|max:15',
            'alamat_petugas' => 'nullable|string|max:255',
            'old_password' => 'nullable|string|min:8',
            'new_password' => 'nullable|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama Petugas tidak boleh kosong!',
            'nip.unique' => 'NIP sudah digunakan',
            'gender.required' => 'Jenis Kelamin tidak boleh kosong!',
            'new_password.confirmed' => 'Konfirmasi Password tidak sesuai.',
        ]);

        if ($request->filled('old_password') && !Hash::check($request->input('old_password'), $user->password)) {
            Alert::error('Error', 'Password lama tidak sesuai.');
            return redirect()->route('dashboard.profile');
        }

        $petugas->update([
            'nip' => $request->nip,
            'gender' => $request->gender,
            'no_telp' => $request->no_telp,
            'alamat_petugas' => $request->alamat_petugas,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->new_password ? Hash::make($request->new_password) : $user->password,
            'role' => $request->role,
        ]);

        Alert::success('Sukses', 'Data Petugas berhasil diupdate!');
        return redirect()->route('dashboard.petugas');
    }

    public function deletePetugas($id)
    {
        // Temukan petugas berdasarkan ID
        $petugas = Petugas::find($id);

        // Jika petugas tidak ditemukan, kembalikan response
        if (!$petugas) {
            Alert::error('Error', 'Petugas Tidak Ditemukan!');
            return redirect()->route('dashboard.petugas');
        }

        // Temukan pengguna terkait
        $user = User::find($petugas->user_id);

        // Jika pengguna tidak ditemukan, kembalikan respons dengan not found
        if (!$user) {
            Alert::error('Error', 'Pengguna Tidak Ditemukan!');
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

    // Controller Edit Profile Petugas
    public function editProfilPetugas()
    {
        // Ambil data user dan admin
        $user = auth()->user();
        $petugas = $user->petugas;

        return view('petugas.update', compact('user', 'petugas'));
    }
    public function editPetugasProcess(Request $request, $id)
    {

        $petugas = Petugas::find($id);

        $user = User::find($petugas->user_id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'nip' => 'sometimes|string|unique:petugas,nip,' . $petugas->id,
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'avatar' => 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:5120',
            'no_telp' => 'nullable|string|max:15',
            'alamat_petugas' => 'required|string|max:255',
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
            'alamat_petugas.required' => 'Alamat wajib di isi.',
            'new_password.confirmed' => 'Konfirmasi Password tidak sesuai.'
        ]);

        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');


        if ($request->filled('old_password') && !Hash::check($request->input('old_password'), $user->password)) {
            Alert::error('Error', 'Password lama tidak sesuai.');
            return redirect()->route('petugas.edit');
        }

        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->input('new_password'));
        }

        $petugas = $user->petugas;
        $petugas->nip = $request->input('nip');
        $petugas->alamat_petugas = $request->input('alamat_petugas');
        $petugas->gender = $request->input('gender');
        $petugas->no_telp = $request->input('no_telp');

        // Hapus avatar lama jika ada
        if ($request->hasFile('avatar') && $user->petugas->avatar && $user->petugas->avatar !== 'default_avatar.jpg') {
            Storage::delete('public/avatar/' . $user->petugas->avatar);
        }

        // Simpan avatar baru jika ada
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatar', 'public');
            $user->petugas->avatar = basename($avatarPath);
        }

        $user->save();
        $petugas->save();


        Alert::success('Success', 'Profil berhasil diperbarui!');
        return redirect()->route('edit.profil.petugas');
    }
}
