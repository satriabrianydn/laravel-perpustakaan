@extends('dashboard.layouts.main')
@section('title', 'Dashboard')

@section('container-fluid')
    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-9">
                        <div class="mb-3">
                            <h5 class="card-title fw-semibold">Daftar Penerbit</h5>
                        </div>
                        <div>
                            <a href="#" class="btn btn-primary">Tambah Penerbit</a>
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
                                        <h6 class="fw-semibold mb-0">Nama Penerbit</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Alamat Penerbit</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Email Penerbit</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Aksi</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($penerbit as $publisher)
                                    <tr>
                                        <td>{{ $penerbit->firstItem() + $loop->index }}</td>
                                        <td>{{ $publisher->nama_penerbit }}</td>
                                        <td>{{ $publisher->alamat_penerbit }}</td>
                                        <td>{{ $publisher->email_penerbit }}</td>                                        
                                        <td>
                                            <a href="#" class="btn btn-edit btn-circle">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
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
                    {{-- {{ $books->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
