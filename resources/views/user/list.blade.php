@extends('dashboard.layouts.main')
@section('title', 'Dashboard')

@section('container-fluid')
    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-9">
                        <div class="mb-3">
                            <h5 class="card-title fw-semibold">Daftar Pengguna</h5>
                            <div class="mb-3">
                                <form action="{{ route('dashboard.user') }}" method="GET">
                                    <input type="text" name="search" placeholder="Cari pengguna..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </form>
                            </div>
                        </div>
                        <div>
                            <a href="#" class="btn btn-primary">Tambah Pengguna</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nomor</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Foto Profil</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nama</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Email</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Aksi</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $users->firstItem() + $loop->index }}</td>
                                        <td>
                                            @if ($user->mahasiswa && $user->mahasiswa->avatar)
                                                <img src="{{ asset('storage/avatar/' . $user->mahasiswa->avatar) }}" alt="Foto Profil" width="50" class="rounded-circle">
                                            @else
                                                <!-- Tampilkan placeholder atau default image jika tidak ada foto profil -->
                                                <img src="{{ asset('storage/avatar/default_avatar.jpg') }}" alt="Foto Profil" width="50" class="rounded-circle">
                                            @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <!-- Tambahkan link atau button untuk mengedit pengguna -->
                                            <a href="#" class="btn btn-edit btn-circle">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            
                                            <!-- Tambahkan form untuk menghapus pengguna -->
                                            <form action="#{{-- {{ route('hapus.pengguna', $user->id) }}--}}" method="POST" class="d-inline"> 
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-delete btn-circle"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada pengguna.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection