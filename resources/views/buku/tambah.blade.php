@extends('dashboard.layouts.main')
@section('title', 'Dashboard')

@section('container-fluid')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Page title -->
                <div class="my-5">
                    <h3>Tambah Buku Baru</h3>
                    <hr>
                </div>
                <!-- Form START -->
                <form class="file-upload" action="{{ route('storeBook') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-5 gx-5">
                        <!-- Content Detail -->
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Detail Buku</h4>
                                    <!-- Judul Buku -->
                                    <div class="col-md-12">
                                        <label for="nama_buku" class="form-label">Judul Buku</label>
                                        <input type="text" class="form-control" id="nama_buku" name="nama_buku"
                                            placeholder="Judul Buku">
                                    </div>
                                    <!-- Kode Buku -->
                                    <div class="col-md-6">
                                        <label for="kode_buku" class="form-label">Kode Buku</label>
                                        <input type="text" class="form-control" placeholder="Kode Buku" id="kode_buku"
                                            name="kode_buku">
                                    </div>
                                    <!-- Tanggal Terbit -->
                                    <div class="col-md-6">
                                        <label for="tanggal_terbit" class="form-label">Tanggal Terbit</label>
                                        <input type="date" id="tanggal_terbit" name="tanggal_terbit"
                                            class="form-control">
                                    </div>
                                    <!-- Nama Pengarang -->
                                    <div class="col-md-6">
                                        <label class="form-label">Nama Pengarang</label>
                                        <input type="text" id="nama_pengarang" name="nama_pengarang" class="form-control"
                                            placeholder="Nama Pengarang">
                                    </div>
                                    <!-- Jumlah Halaman -->
                                    <div class="col-md-6">
                                        <label class="form-label">Jumlah Halaman</label>
                                        <input type="text" id="jumlah_halaman" name="jumlah_halaman" class="form-control"
                                            placeholder="Jumlah Halaman">
                                    </div>
                                    <!-- Penerbit -->
                                    <div class="col-md-6">
                                        <label for="penerbit" class="form-label">Penerbit</label>
                                        <select class="form-select" id="id_penerbit" name="id_penerbit">
                                            <option value="" selected disabled>Pilih Penerbit</option>
                                            @foreach ($penerbits as $penerbit)
                                                <option value="{{ $penerbit->id }}">{{ $penerbit->nama_penerbit }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="penerbit" class="form-label">Kategori</label>
                                        <select class="form-select" id="id_kategori" name="id_kategori">
                                            <option value="" selected disabled>Pilih Kategori</option>
                                            @foreach ($kategori as $category)
                                                <option value="{{ $category->id }}">{{ $category->kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> <!-- Row END -->
                            </div>
                        </div>
                        <!-- Upload Cover Buku -->
                        <div class="col-xxl-4">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Upload Cover Buku</h4>
                                    <div class="text-center">
                                        <!-- Image upload -->
                                        <div class="square position-relative display-2 mb-3">
                                            <!-- Hidden input for old cover path -->
                                            <input type="hidden" id="defaultCover" value="{{ asset('storage/covers/no_image_available.png') }}">
                                            <img id="coverPreview" src="{{ asset('storage/covers/no_image_available.png') }}" alt="Cover Buku" class="img-fluid">
                                        </div>
                                        <!-- Button -->
                                        <input type="file" id="foto_buku" name="foto_buku" hidden="" onchange="previewCover(this)">
                                        <label class="btn btn-success btn-block" for="foto_buku">Upload</label>
                                        <!-- Content -->
                                        <p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>Maksimal ukuran
                                            file 5MB</p>
                                        <p class="text-muted mt-1 mb-0"><span class="me-1">Format:</span>(JPG, JPEG, PNG)
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row END -->

                    <!-- button -->
                    <div class="gap-3 d-md-flex justify-content-md-end text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Tambah Buku</button>
                        <a href="{{ route('dashboard.buku') }}" class="btn btn-danger btn-lg">Kembali</a>
                    </div>
                </form> <!-- Form END -->
            </div>
        </div>
    </div>
@endsection
