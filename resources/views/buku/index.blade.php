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
                            <a href="{{ route('dashboard.buku.tambah') }}" class="btn btn-primary">Tambah Buku</a>
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
                                        <h6 class="fw-semibold mb-0">Kode Buku</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Cover Buku</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Judul</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Kategori</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Pengarang</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Penerbit</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Jumlah Halaman</h6>
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
                                @forelse ($books as $book)
                                    <tr>
                                        <td>{{ $books->firstItem() + $loop->index }}</td>
                                        <td>{{ $book->kode_buku }}</td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            @if ($book->foto_buku)
                                                <img src="{{ asset('storage/' . $book->foto_buku) }}"
                                                    alt="Cover Buku" width="50">
                                            @else
                                                <img src="{{ asset('storage/covers/no_image_available.png' . $book->foto_buku) }}"
                                                    alt="No Images" width="50">
                                            @endif
                                        </td>
                                        <td>{{ $book->nama_buku }}</td>
                                        <td>{{ optional($book->kategori)->kategori }}</td>
                                        <td>{{ $book->nama_pengarang }}</td>
                                        <td>{{ optional($book->penerbit)->nama_penerbit }}</td>
                                        <td>{{ $book->jumlah_halaman }}</td>
                                        <td>{{ $book->tanggal_terbit }}</td>
                                        
                                        <td>
                                            <a href="#" class="btn btn-edit btn-circle">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('hapus.buku', $book->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-delete btn-circle"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Belum ada buku.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        <div class="mt-3">
                            Halaman : {{ $books->currentPage() }} <br />
                            Jumlah Data : {{ $books->total() }} <br />
                            Data Per Halaman : {{ $books->perPage() }} <br />
    
                            <div class="mt-3">
                                <div class="pagination-buttons">
                                    @if($books->currentPage() > 1)
                                        <a href="{{ $books->previousPageUrl() }}" class="btn btn-pagination">Previous</a>
                                    @endif
                                
                                    @for ($i = 1; $i <= $books->lastPage(); $i++)
                                        <a href="{{ $books->url($i) }}" class="btn btn-pagination {{ $books->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                                    @endfor
                                
                                    @if($books->currentPage() < $books->lastPage())
                                        <a href="{{ $books->nextPageUrl() }}" class="btn btn-pagination">Next</a>
                                    @endif
                                </div>  
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
