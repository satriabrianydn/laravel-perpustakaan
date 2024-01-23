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
                            <div class="mt-3">
                                <form action="{{ route('dashboard.user') }}" method="GET">
                                    <input type="text" name="search" class="form-control" placeholder="Cari Mahasiswa..."
                                        value="{{ request('search') }}">
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mb-3">
                            <a href="{{ route('admin.tambah.user') }}" class="btn btn-primary">Tambah Pengguna</a>
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
                                        <h6 class="fw-semibold mb-0">NIM</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Foto Profil</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nama</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Jenis Kelamin</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Email</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nomor Telepon</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Program Studi</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Angkatan</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Kelas</h6>
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
                                        <td>{{ $user->mahasiswa->nim }}</td>
                                        <td>
                                            @if ($user->mahasiswa && $user->mahasiswa->avatar)
                                                <img src="{{ asset('storage/avatar/' . $user->mahasiswa->avatar) }}"
                                                    alt="Foto Profil" width="50" class="rounded-circle">
                                            @else
                                                <!-- Tampilkan placeholder atau default image jika tidak ada foto profil -->
                                                <img src="{{ asset('storage/avatar/default_avatar.jpg') }}"
                                                    alt="Foto Profil" width="50" class="rounded-circle">
                                            @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->mahasiswa->gender }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->mahasiswa->no_telp }}</td>
                                        <td>{{ $user->mahasiswa->prodi }}</td>
                                        <td>{{ $user->mahasiswa->angkatan }}</td>
                                        <td>{{ $user->mahasiswa->kelas }}</td>
                                        <td>
                                            <!-- Tambahkan link atau button untuk mengedit pengguna -->
                                            <a href="{{ route('admin.edit.profile', $user->id) }}"
                                                class="btn btn-edit btn-circle">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <!-- Tambahkan form untuk menghapus pengguna -->
                                            <form action="{{ route('admin.delete.user', $user->id) }}" method="POST"
                                                class="d-inline">
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
                                        <td colspan="9" class="text-center">Belum ada pengguna.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        Halaman : {{ $users->currentPage() }} <br />
                        Jumlah Data : {{ $users->total() }} <br />
                        Data Per Halaman : {{ $users->perPage() }} <br />

                        <div class="mt-3">
                            <div class="pagination-buttons">
                                @if ($users->currentPage() > 1)
                                    <a href="{{ $users->previousPageUrl() }}" class="btn btn-pagination">Previous</a>
                                @endif

                                @for ($i = 1; $i <= $users->lastPage(); $i++)
                                    <a href="{{ $users->url($i) }}"
                                        class="btn btn-pagination {{ $users->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                                @endfor

                                @if ($users->currentPage() < $users->lastPage())
                                    <a href="{{ $users->nextPageUrl() }}" class="btn btn-pagination">Next</a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
