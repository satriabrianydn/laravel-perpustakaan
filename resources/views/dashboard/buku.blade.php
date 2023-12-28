@extends('dashboard.layouts.main')
@section('title', 'Dashboard')

@section('container-fluid')
    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-9">
                        <div class="mb-3">
                            <h5 class="card-title fw-semibold">Daftar Buku</h5>
                        </div>
                        <div>
                            <a href="#" class="btn btn-primary">Tambah Buku</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">ID</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Cover Buku</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Judul</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Pengarang</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Penerbit</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Tahun Terbit</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Aksi</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>
                                            @if ($book->foto_buku)
                                                <img src="{{ asset('storage/covers/' . $book->foto_buku) }}"
                                                    alt="Cover Buku" width="50">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>{{ $book->nama_buku }}</td>
                                        <td>{{ $book->nama_pengarang }}</td>
                                        <td>{{ optional($book->penerbit)->nama_penerbit }}</td>
                                        <td>{{ $book->tanggal_terbit }}</td>
                                        <td>
                                            <a href="#" class="btn btn-edit btn-circle">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{-- {{ route('books.destroy', $book->id) }} --}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-delete btn-circle"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
