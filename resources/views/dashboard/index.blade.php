@extends('dashboard.layouts.main')
@section('title', 'Dashboard')

@section('container-fluid')
    <div class="row">
        @if (in_array(auth()->user()->role, ['Administrator', 'Petugas']))
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    <div class="col-lg-3">
                        <div class="card"> <!-- Data User -->
                            <div class="card-body">
                                <a href="{{ route('dashboard.user') }}" class="">
                                    <div class="row align-items-start">
                                        <div class="col-8">
                                            <h5 class="card-title mb-9 fw-semibold">Total<br> Anggota</h5>
                                            <h4 class="fw-semibold mb-3">{{ $totalUser }}</h4>

                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end">
                                                <div
                                                    class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-user fs-6"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div> <!-- Data User End -->
                    </div>
                    <div class="col-lg-3">
                        <div class="card"> <!-- Data Buku -->
                            <div class="card-body">
                                <a href="{{ route('dashboard.buku') }}" class="">
                                    <div class="row alig n-items-start">
                                        <div class="col-8">
                                            <h5 class="card-title mb-9 fw-semibold">Total <br>Buku</h5>
                                            <h4 class="fw-semibold mb-3">{{ $totalBuku }}</h4>

                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end">
                                                <div
                                                    class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-book fs-6"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div> <!-- Data Buku End-->
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <a href="#" class="">
                                    <div class="row alig n-items-start">
                                        <div class="col-8">
                                            <h5 class="card-title mb-9 fw-semibold">Total<br> Peminjaman</h5>
                                            <h4 class="fw-semibold mb-3">0</h4>

                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end">
                                                <div
                                                    class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-cards fs-6"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif (auth()->user()->role == 'Mahasiswa')
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    <div class="col-lg-3">
                        <div class="card"> <!-- Data Buku -->
                            <div class="card-body">
                                <a href="#" class="">
                                    <div class="row alig n-items-start">
                                        <div class="col-8">
                                            <h5 class="card-title mb-9 fw-semibold">Total Buku <br>Yang Dipinjam</h5>
                                            <h4 class="fw-semibold mb-3">0</h4>

                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end">
                                                <div
                                                    class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-book fs-6"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div> <!-- Data Buku End-->
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <a href="#" class="">
                                    <div class="row alig n-items-start">
                                        <div class="col-8">
                                            <h5 class="card-title mb-9 fw-semibold">Buku Yang Dikembalikan</h5>
                                            <h4 class="fw-semibold mb-3">0</h4>

                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end">
                                                <div
                                                    class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-cards fs-6"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <a href="../loan_data/?late" class="">
                                    <div class="row alig n-items-start">
                                        <div class="col-8">
                                            <h5 class="card-title mb-9 fw-semibold">Pengembalian Terlambat</h5>
                                            <h4 class="fw-semibold mb-3">0</h4>

                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end">
                                                <div
                                                    class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-file-description fs-6"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
