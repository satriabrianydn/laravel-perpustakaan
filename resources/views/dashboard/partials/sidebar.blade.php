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

                @if (auth()->user()->role == 'Administrator')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">MANAGE DATA</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#" aria-expanded="false">
                            <span>
                                <i class="ti ti-user-check"></i>
                            </span>
                            <span class="hide-menu">Data Petugas</span>
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
                        <a class="sidebar-link" href="#" aria-expanded="false">
                            <span>
                                <i class="ti ti-users"></i>
                            </span>
                            <span class="hide-menu">Data User</span>
                        </a>
                    </li>


                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">TRANSACTION DATA</span>
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
                @endif

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">USER AREA</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" aria-expanded="false">
                        <span>
                            <i class="ti ti-pencil"></i>
                        </span>
                        <span class="hide-menu">Edit Profile</span>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
