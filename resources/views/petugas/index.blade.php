@extends('dashboard.layouts.main')
@section('title', 'Dashboard')

@section('container-fluid')
    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-9">
                        <div class="mb-3">
                            <h5 class="card-title fw-semibold">Daftar Petugas</h5>
                            <div class="mt-3">
                                <form action="#" method="GET">
                                    <input type="text" name="search" class="form-control" placeholder="Cari Petugas..."
                                        value="{{ request('search') }}">
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mb-3">
                            <a href="#" class="btn btn-primary">Tambah Petugas</a>
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
                                        <h6 class="fw-semibold mb-0">Nama</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Aksi</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($petugas as $officer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $officer->name }}</td>
                                        <td>
                                            <a href="#"
                                                class="btn btn-edit btn-circle">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <!-- Tambahkan form untuk menghapus pengguna -->
                                            <form action="#" method="POST"
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
                                        <td colspan="3" class="text-center">Belum ada pengguna.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        Halaman : {{ $petugas->currentPage() }} <br />
                        Jumlah Data : {{ $petugas->total() }} <br />
                        Data Per Halaman : {{ $petugas->perPage() }} <br />

                        <div class="mt-3">
                            <div class="pagination-buttons">
                                @if ($petugas->currentPage() > 1)
                                    <a href="{{ $petugas->previousPageUrl() }}" class="btn btn-pagination">Previous</a>
                                @endif

                                @for ($i = 1; $i <= $petugas->lastPage(); $i++)
                                    <a href="{{ $petugas->url($i) }}"
                                        class="btn btn-pagination {{ $petugas->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                                @endfor

                                @if ($petugas->currentPage() < $petugas->lastPage())
                                    <a href="{{ $petugas->nextPageUrl() }}" class="btn btn-pagination">Next</a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
