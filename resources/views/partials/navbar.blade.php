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
                    <a class="nav-link active" href="#">
                        <i class="fa-solid fa-house"></i><span class="icon-text">BERANDA</span></a>
                </li>
                <li class="nav-item dropdown" id="auto-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-list"></i><span class="icon-text">Kategori</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item disabled" href="#">Disabled</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact-us">
                        <i class="fa-solid fa-phone"></i><span class="icon-text">CONTACT US</span></a>
                </li>
                @if (Auth::check())
                    {{-- Perlu Di Fix Ukuran Icon e --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-regular fa-circle-user"></i>
                        </a>
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
