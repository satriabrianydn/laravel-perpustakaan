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
                    <h3>Tambah Petugas</h3>
                    <hr>
                </div>
                <!-- Form START -->
                <form class="file-upload" action="{{ route('tambah.petugas.proses') }}" method="POST">
                    @csrf
                    <div class="row mb-5 gx-5">
                        <!-- Contact detail -->
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Detail Profil</h4>
                                    <!-- Nama Lengkap -->
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Nama Petugas</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Nama Lengkap" value="{{ old('name') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nip" class="form-label">NIP</label>
                                        <input type="text" class="form-control" id="nip" name="nip"
                                            placeholder="NIP" value="{{ old('nip') }}">
                                    </div>
                                    <!-- Phone number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Nomor Telepon</label>
                                        <input type="text" class="form-control" placeholder="Nomor Telepon"
                                            id="no_telp" name="no_telp" value="{{ old('no_telp') }}">
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email" value="{{ old('email') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="gender" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" id="gender" name="gender">
                                            <option value="" selected disabled hidden>-- Pilih Jenis Kelamin --</option>
                                            <option value="Laki-Laki" {{ old('gender') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                            <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="role" class="form-label">Role</label>
                                        <select class="form-select" id="role" name="role">
                                            <option value="" selected disabled hidden>-- Pilih Role --</option>
                                            <option value="Petugas" {{ old('role') == 'Petugas' ? 'selected' : '' }}>Petugas</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="alamat_petugas" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="alamat_petugas" name="alamat_petugas" rows="4"
                                            placeholder="Alamat Petugas">{{ old('alamat_petugas') }}</textarea>
                                    </div>                                
                                </div> <!-- Row END -->
                            </div>
                        </div>
                    </div> <!-- Row END -->

                   
                    <div class="row mb-5 gx-5">
                        <!-- Create Password -->
                        <div class="col-xxl-6">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="my-3">Password</h4>
                                    <!-- New password -->
                                    <div class="col-md-6">
                                        <label for="new_password" class="form-label">Password Baru *</label>
                                        <input type="password" class="form-control" id="new_password"
                                            name="new_password">
                                    </div>
                                    <!-- Confirm password -->
                                    <div class="col-md-6">
                                        <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                                        <input type="password" class="form-control" id="new_password_confirmation"
                                            name="new_password_confirmation">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row END -->
                    <!-- button -->
                    <div class="gap-3 d-md-flex justify-content-md-end text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Tambah Petugas</button>
                        <a href="{{ route('dashboard.petugas') }}" class="btn btn-danger btn-lg">Kembali</a>
                    </div>
                </form> <!-- Form END -->
            </div>
        </div>
    </div>
@endsection
