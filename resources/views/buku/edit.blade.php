@extends('dashboard.layouts.main')
@section('title', 'Edit Buku')

@section('container-fluid')
    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title fw-semibold">Edit Buku</h5>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Tambahkan aksi dan metode formulir di sini -->
                    <form class="file-upload" action="{{ route('buku.update', ['id' => $book->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Tambahkan bidang formulir sesuai dengan atribut model buku Anda -->
                        <div class="mb-3">
                            <label for="nama_buku" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" id="nama_buku" name="nama_buku"
                                value="{{ $book->nama_buku }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="kode_buku" class="form-label">Kode Buku</label>
                            <input type="text" class="form-control" id="kode_buku" name="kode_buku"
                                value="{{ $book->kode_buku }}" required>
                        </div>

                        <div class="mb-6">
                            <label class="form-label">Nama Pengarang</label>
                            <input type="text" id="nama_pengarang" name="nama_pengarang" class="form-control"
                                value="{{ $book->nama_pengarang }}" required>
                        </div>
                        <div class="mb-6">
                            <label class="form-label">Jumlah Halaman</label>
                            <input type="text" id="jumlah_halaman" name="jumlah_halaman" class="form-control"
                                value="{{ $book->jumlah_halaman }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" id="id_kategori" name="id_kategori" value="{{ $book->jumlah_halaman }}" required>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}"
                                        {{ $book->kategori_id == $k->id ? 'selected' : '' }}>
                                        {{ $k->kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Deskripsi Buku">{{ $book->deskripsi }}</textarea>
                        </div>
                        <div class="col-xxl-4">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Upload Cover Buku</h4>
                                    <div class="text-center">
                                        <!-- Image upload -->
                                        <div class="square position-relative display-2 mb-3">
                                            <!-- Hidden input for old cover path -->
                                            <input type="hidden" id="defaultCover"
                                                value="{{ asset('storage/covers/no_image_available.png') }}">
                                            <img id="coverPreview"
                                                src="{{ asset('storage/covers/no_image_available.png') }}" alt="Cover Buku"
                                                class="img-fluid">
                                        </div>
                                        <!-- Button -->
                                        <input type="file" id="foto_buku" name="foto_buku" style="display: none;" onchange="previewCover(this)">
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
                        <!-- Tambahkan bidang formulir lainnya untuk pengeditan -->

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Perbarui Buku</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
