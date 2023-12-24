<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/img/logo/logo-circle.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/vendor/adminlte/dist/img/user2-160x160.jpg') }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                <span class="d-block text-light">{{ auth()->user()->role }}</span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="fa-solid fa-house nav-icon"></i>
                        <p>Beranda</p>
                    </a>
                </li>

                @if (auth()->user()->role == 'Administrator')
                    <!-- Menu untuk Admin -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-database nav-icon "></i>
                            <p>
                                Data Master
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    {{-- <i class="fa-solid fa-book nav-icon"></i> --}}
                                    <p>- <strong>Data Buku</strong></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    {{-- <i class="fa-regular fa-circle-user nav-icon"></i> --}}
                                    <p>- <strong>Data User</strong></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    {{-- <i class="fa-solid fa-user-tie nav-icon"></i> --}}
                                    <p>- <strong> Data Petugas</strong></p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-cart-shopping nav-icon "></i>
                            <p>
                                Data Transaksi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    {{-- <i class="fa-regular fa-circle-dot nav-icon"></i> --}}
                                    <p>- <strong>Data Pinjaman</strong></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    {{-- <i class="fa-regular fa-circle-dot nav-icon"></i> --}}
                                    <p>- <strong>Data Denda</strong></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    {{-- <i class="fa-regular fa-circle-dot nav-icon"></i> --}}
                                    <p>- <strong>History Pengguna</strong></p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @elseif(auth()->user()->role == 'Petugas')
                    <!-- Menu untuk Petugas -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-cart-shopping nav-icon "></i>
                            <p>
                                Data Transaksi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    {{-- <i class="fa-regular fa-circle-dot nav-icon"></i> --}}
                                    <p>- <strong>Data Pinjaman</strong></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    {{-- <i class="fa-regular fa-circle-dot nav-icon"></i> --}}
                                    <p>- <strong>Data Denda</strong></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    {{-- <i class="fa-regular fa-circle-dot nav-icon"></i> --}}
                                    <p>- <strong>History Pengguna</strong></p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @elseif(auth()->user()->role == 'Mahasiswa')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-pencil nav-icon"></i>
                            <p>Edit Profil</p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-file nav-icon"></i>
                        <p>Pengumuman</p>
                    </a>
                </li>

                <a href="/logout" class="btn btn-danger text-light">Logout</a>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
