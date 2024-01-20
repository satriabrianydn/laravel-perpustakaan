<!--  Header Start -->
<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item">
                <span id="greeting"></span> <strong>{{ auth()->user()->name }}</strong>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item">
                    <span id="jam"></span>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @if (auth()->user()->role == 'Administrator' && auth()->user()->mahasiswa)
                            <img src="{{ asset('storage/avatar/' . auth()->user()->mahasiswa->avatar) }}" alt="Avatar"
                                width="35" height="35" class="rounded-circle">
                        @elseif (auth()->user()->role == 'Petugas' && auth()->user()->petugas)
                            <img src="{{ asset('storage/avatar/' . auth()->user()->petugas->avatar) }}" alt="Avatar"
                                width="35" height="35" class="rounded-circle">
                        @elseif (auth()->user()->role == 'Mahasiswa' && auth()->user()->mahasiswa)
                            <img src="{{ asset('storage/avatar/' . auth()->user()->mahasiswa->avatar) }}" alt="Avatar"
                                width="35" height="35" class="rounded-circle">
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            {{-- List Menu Admin Navbar Dashboard --}}
                            @if (in_array(auth()->user()->role, ['Administrator', 'Petugas']))
                                <a href="{{ route('home.index') }}"
                                    class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-home fs-6"></i>
                                    <p class="mb-0 fs-3">Back to Home</p>
                                </a>
                                {{-- List Menu Mahasiswa Navbar Dashboard --}}
                            @elseif (auth()->user()->role == 'Mahasiswa')
                                <a href="{{ route('home.index') }}"
                                    class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-home fs-6"></i>
                                    <p class="mb-0 fs-3">Back to Home</p>
                                </a>
                                <a href="{{ route('dashboard.profile') }}"
                                    class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-user fs-6"></i>
                                    <p class="mb-0 fs-3">My Profile</p>
                                </a>
                            @endif
                            <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--  Header End -->
