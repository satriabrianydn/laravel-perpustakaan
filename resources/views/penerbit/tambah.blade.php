@extends('dashboard.layouts.main')
@section('title', 'Dashboard')

@section('container-fluid')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif  
                <!-- Page title -->
                <div class="my-5">
                    <h3>Tambah Penerbit</h3>
                    <hr>
                </div>
                <!-- Form START -->
                <form class="file-upload" action="#" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-5 gx-5">
                        <!-- Contact detail -->
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Detail Penerbit</h4>
                                    <!-- Nama Penerbit -->
                                    <div class="col-md-6">
                                        <label for="nama_penerbit" class="form-label">Nama Penerbit</label>
                                        <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit"
                                            placeholder="Nama Penerbit">
                                    </div>
                                    <!-- Email Penerbit-->
                                    <div class="col-md-6">
                                        <label for="email_penerbit" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email_penerbit" name="email_penerbit"
                                            placeholder="Email Penerbit">
                                    </div>
                                    <!-- Alamat Penerbit -->
                                    <div class="col-md-12">
                                        <label for="alamat_penerbit" class="form-label">Alamat Penerbit</label>
                                        <textarea class="form-control" id="alamat_penerbit" name="alamat_penerbit" rows="4"
                                            placeholder="Alamat Penerbit"></textarea>
                                    </div>
                                </div> <!-- Row END -->
                            </div>
                        </div>
                    </div> <!-- Row END -->

                    <!-- button -->
                    <div class="gap-3 d-md-flex justify-content-md-end text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Tambah Penerbit</button>
                        <a href="{{ route('dashboard.penerbit') }}" class="btn btn-danger btn-lg">Kembali</a>
                    </div>
                </form> <!-- Form END -->
            </div>
        </div>
    </div>
@endsection
