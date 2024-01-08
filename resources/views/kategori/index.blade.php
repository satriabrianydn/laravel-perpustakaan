@extends('dashboard.layouts.main')
@section('title', 'Dashboard')

@section('container-fluid')
    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-9">
                        <div class="mb-3">
                            <h5 class="card-title fw-semibold">Daftar Kategori</h5>
                            <div class="mt-3">
                                <form action="{{ route('dashboard.kategori') }}" method="GET">
                                    <input type="text" name="search" class="form-control" placeholder="Cari Kategori..." value="{{ $search ?? '' }}">
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('dashboard.kategori.tambah') }}" class="btn btn-primary">Tambah Kategori</a>
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
                                        <h6 class="fw-semibold mb-0">Nama Kategori</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Jumlah Buku</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Aksi</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kategori as $category)
                                    <tr>
                                        <td>{{ $kategori->firstItem() + $loop->index }}</td>
                                        <td>{{ $category->kategori }}</td>
                                        <td>{{ $category->buku_count }}</td>
                                        <td>
                                            {{-- <a href="#" class="btn btn-edit btn-circle">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a> --}}
                                            <form action="#" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-delete btn-circle"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus penerbit ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Belum ada data penerbit.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        Halaman : {{ $kategori->currentPage() }} <br />
                        Jumlah Data : {{ $kategori->total() }} <br />
                        Data Per Halaman : {{ $kategori->perPage() }} <br />

                        <div class="mt-3">
                            <div class="pagination-buttons">
                                @if ($kategori->currentPage() > 1)
                                    <a href="{{ $kategori->previousPageUrl() }}" class="btn btn-pagination">Previous</a>
                                @endif

                                @for ($i = 1; $i <= $kategori->lastPage(); $i++)
                                    <a href="{{ $kategori->url($i) }}"
                                        class="btn btn-pagination {{ $kategori->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                                @endfor

                                @if ($kategori->currentPage() < $kategori->lastPage())
                                    <a href="{{ $kategori->nextPageUrl() }}" class="btn btn-pagination">Next</a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
