@extends('dashboard.layouts.main')
@section('title', 'Dashboard')

@section('container-fluid')
    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-9">
                        <div class="mb-3">
                            <h5 class="card-title fw-semibold">Daftar Administrator</h5>
                            <div class="mt-3">
                                <form action="{{ route('dashboard.admin') }}" method="GET">
                                    <input type="text" name="search" class="form-control" placeholder="Cari Admin..."
                                        value="{{ request('search') }}">
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mb-3">
                            <a href="{{ route('dashboard.admin.tambah') }}" class="btn btn-primary">Tambah Admin</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr style="text-align: center;">
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nomor</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">NIP</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Foto Profil</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nama admin</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Jenis Kelamin</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Alamat</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nomor Telepon</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Role</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Aksi</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($admin as $administrator)
                                    <tr style="text-align: center;">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $administrator->nip }}</td>
                                        <td>
                                            <img src="{{ asset('storage/avatar/' . $administrator->avatar) }}"
                                                alt="Foto Profil" width="50" class="rounded-circle">
                                        </td>
                                        <td>{{ $administrator->user->name }}</td>
                                        <td>{{ $administrator->gender }}</td>
                                        <td>{{ $administrator->alamat_admin ?? '-' }}</td>
                                        <td>{{ $administrator->no_telp ?? '-' }}</td>
                                        <td>{{ $administrator->user->role }}</td>
                                        <td>
                                            @if (auth()->user()->id !== $administrator->user_id)
                                                <!-- Tambahkan form untuk menghapus pengguna -->
                                                <form
                                                    action="{{ route('dashboard.admin.delete', ['id' => $administrator->id]) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-delete btn-circle"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Belum ada data admin.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        Halaman : {{ $admin->currentPage() }} <br />
                        Jumlah Data : {{ $admin->total() }} <br />
                        Data Per Halaman : {{ $admin->perPage() }} <br />

                        <div class="mt-3">
                            <div class="pagination-buttons">
                                @if ($admin->currentPage() > 1)
                                    <a href="{{ $admin->previousPageUrl() }}" class="btn btn-pagination">Previous</a>
                                @endif

                                @for ($i = 1; $i <= $admin->lastPage(); $i++)
                                    <a href="{{ $admin->url($i) }}"
                                        class="btn btn-pagination {{ $admin->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                                @endfor

                                @if ($admin->currentPage() < $admin->lastPage())
                                    <a href="{{ $admin->nextPageUrl() }}" class="btn btn-pagination">Next</a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
