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
                    <h3>My Profile</h3>
                    <hr>
                </div>
                <!-- Form START -->
                <form class="file-upload" action="{{ route('admin.update.profile', $user->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-5 gx-5">
                        <!-- Contact detail -->
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Detail Profil</h4>
                                    <!-- Nama Lengkap -->
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Nama Lengkap" value="{{ $user->name }}">
                                    </div>
                                    <!-- Phone number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Nomor Telepon</label>
                                        <input type="text" class="form-control" placeholder="Nomor Telepon"
                                            id="no_telp" name="no_telp" value="{{ $user->mahasiswa->no_telp }}" disabled>
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email" value="{{ $user->email }}" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="gender" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" id="gender" name="gender">
                                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                            <option value="Laki-Laki" @if ($user->mahasiswa->gender == 'Laki-Laki') selected @endif>
                                                Laki-Laki</option>
                                            <option value="Perempuan" @if ($user->mahasiswa->gender == 'Perempuan') selected @endif>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                </div> <!-- Row END -->
                            </div>
                        </div>
                        <!-- Upload profile -->
                        <div class="col-xxl-4">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Upload Foto Profil</h4>
                                    <div class="text-center">
                                        <!-- Image upload -->
                                        <div class="square position-relative display-2 mb-3">
                                            <!-- Hidden input for old avatar path -->
                                            <input type="hidden" id="oldAvatarPath" name="oldAvatarPath"
                                                value="{{ asset('storage/avatar/' . $user->mahasiswa->avatar) }}">
                                            <img id="avatarPreview"
                                                src="{{ asset('storage/avatar/' . $user->mahasiswa->avatar) }}"
                                                alt="Avatar" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row END -->

                    <!-- Info Mahasiswa -->
                    <div class="row mb-5 gx-5">
                        <div class="col-xxl-6 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Detail Mahasiswa</h4>
                                    <!-- NIM -->
                                    <div class="col-md-6">
                                        <label class="form-label">NIM</label>
                                        <input type="text" id="nim" name="nim" class="form-control"
                                            placeholder="NIM" value="{{ $user->mahasiswa->nim }}">
                                    </div>
                                    <!-- Program Studi -->
                                    <div class="col-md-6">
                                        <label class="form-label">Program Studi</label>
                                        <input type="text" id="prodi" name="prodi" class="form-control"
                                            placeholder="Program Studi" value="{{ $user->mahasiswa->prodi }}">
                                    </div>
                                    <!-- Kelas -->
                                    <div class="col-md-6">
                                        <label class="form-label">Kelas</label>
                                        <input type="text" class="form-control" placeholder="Kelas" id="kelas"
                                            name="kelas" value="{{ $user->mahasiswa->kelas }}">
                                    </div>
                                    <!-- Angkatan -->
                                    <div class="col-md-6">
                                        <label class="form-label">Angkatan</label>
                                        <input type="text" class="form-control" placeholder="Angkatan" id="angkatan"
                                            name="angkatan" value="{{ $user->mahasiswa->angkatan }}">
                                    </div>
                                </div> <!-- Row END -->
                            </div>
                        </div>
                    </div> <!-- Row END -->
                    <!-- button -->
                    <div class="gap-3 d-md-flex justify-content-md-end text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Update Profile</button>
                    </div>
                </form> <!-- Form END -->
            </div>
        </div>
    </div>
@endsection
