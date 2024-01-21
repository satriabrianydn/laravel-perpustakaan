<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="#" class="text-nowrap logo-img">
                <img src="{{ asset('assets/img/logo/logo-circle.png') }}" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                {{-- <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
          </li> --}}
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                        href="{{ route('dashboard.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-home"></i>
                        </span>
                        <span class="hide-menu">Beranda</span>
                    </a>
                </li>

                @if (in_array(auth()->user()->role, ['Administrator', 'Petugas']))
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">DATA MASTER</span>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('dashboard.petugas') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('dashboard.petugas') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-user-check"></i>
                            </span>
                            <span class="hide-menu">Data Petugas</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link {{ request()->routeIs('dashboard.user') ? 'active' : '' }}"
                            href="{{ route('dashboard.user') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-users"></i>
                            </span>
                            <span class="hide-menu">Data Mahasiswa</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link {{ request()->routeIs('dashboard.buku') ? 'active' : '' }}"
                            href="{{ route('dashboard.buku') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-book-2"></i>
                            </span>
                            <span class="hide-menu">Data Buku</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link {{ request()->routeIs('dashboard.penerbit') ? 'active' : '' }}"
                            href="{{ route('dashboard.penerbit') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-cylinder"></i>
                            </span>
                            <span class="hide-menu">Data Penerbit</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('dashboard.kategori') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-category"></i>
                            </span>
                            <span class="hide-menu">Data Kategori</span>
                        </a>
                    </li>


                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Menu Transaksi</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#" aria-expanded="false">
                            <span>
                                <i class="ti ti-shopping-cart"></i>
                            </span>
                            <span class="hide-menu">Data Transaksi</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#" aria-expanded="false">
                            <span>
                                <i class="ti ti-user-plus"></i>
                            </span>
                            <span class="hide-menu">Data Peminjaman</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#" aria-expanded="false">
                            <span>
                                <i class="ti ti-cash"></i>
                            </span>
                            <span class="hide-menu">Data Denda</span>
                        </a>
                    </li>                
                @elseif(auth()->user()->role == 'Mahasiswa')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Menu Transaksi</span>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#" aria-expanded="false">
                            <span>
                                <i class="ti ti-shopping-cart-plus"></i>
                            </span>
                            <span class="hide-menu">Tambah Peminjaman</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#" aria-expanded="false">
                            <span>
                                <i class="ti ti-book"></i>
                            </span>
                            <span class="hide-menu">Data Peminjaman</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#" aria-expanded="false">
                            <span>
                                <i class="ti ti-rotate"></i>
                            </span>
                            <span class="hide-menu">Data Pengembalian</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#" aria-expanded="false">
                            <span>
                                <i class="ti ti-cash"></i>
                            </span>
                            <span class="hide-menu">Data Denda</span>
                        </a>
                    </li>

                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">User Panel</span>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link {{ request()->routeIs('dashboard.profile') ? 'active' : '' }}"
                            href="{{ route('dashboard.profile') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-pencil"></i>
                            </span>
                            <span class="hide-menu">Edit Profile</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
