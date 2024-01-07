<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <img src="{{ asset('assets/img/logo/logo.png') }}" width="100px" alt="Logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home.index') ? 'active' : '' }}" href="{{ route('home.index') }}" role="button">
                        <i class="fa-solid fa-house"></i><span class="icon-text">BERANDA</span>
                    </a>
                </li>
                <li class="nav-item dropdown" id="auto-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-list"></i><span class="icon-text">Kategori</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ request()->routeIs('category.horror') ? 'active' : '' }}" href="{{ route('category.horror') }}">HORROR</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('category.puisi') ? 'active' : '' }}" href="{{ route('category.puisi') }}">PUISI</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('category.nonfiksi') ? 'active' : '' }}" href="{{ route('category.nonfiksi') }}">NONFIKSI</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('category.fiksi') ? 'active' : '' }}" href="{{ route('category.fiksi') }}">FIKSI</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('category.cerpen') ? 'active' : '' }}" href="{{ route('category.cerpen') }}">CERPEN</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('category.ekonomi') ? 'active' : '' }}" href="{{ route('category.ekonomi') }}">EKONOMI</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('category.biologi') ? 'active' : '' }}" href="{{ route('category.biologi') }}">BIOLOGI</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('category.teknologi') ? 'active' : '' }}" href="{{ route('category.teknologi') }}">TEKNOLOGI</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('category.sejarah') ? 'active' : '' }}" href="{{ route('category.sejarah') }}">SEJARAH</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('category.agama_islam') ? 'active' : '' }}" href="{{ route('category.agama_islam') }}">AGAMA ISLAM</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('category.fisika') ? 'active' : '' }}" href="{{ route('category.fisika') }}">FISIKA</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('category.matematika') ? 'active' : '' }}" href="{{ route('category.matematika') }}">MATEMATIKA</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('category.inggris') ? 'active' : '' }}" href="{{ route('category.inggris') }}">INGGRIS</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact-us">
                        <i class="fa-solid fa-phone"></i><span class="icon-text">CONTACT US</span></a>
                </li>
                @if (Auth::check())
                <li class="nav-item dropdown" id="auto-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-user-circle"></i><span class="icon-text">Hai, {{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            <span class="icon-text">Login</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
