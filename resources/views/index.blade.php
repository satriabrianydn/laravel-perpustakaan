@extends('layouts.main')
@section('title', 'Halaman Utama | Perpustakaan Online Universitas Duta Bangsa Surakarta')
@section('body')
    <div class="fakeLoader"></div>
@endsection
@section('header')
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
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('main')
    {{-- Carousel --}}
    <div class="carousel">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Slide 1">
                    <div class="carousel-caption d-md-block">
                        <h5 class="animate__animated animate__fadeInDown">First slide label</h5>
                        <p class="animate__animated animate__fadeInUp">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam, voluptatum!</p>
                        <div class="carousel-button animate__animated animate__fadeInLeft">
                            <a class="btn btn-warning" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Slide 2">
                    <div class="carousel-caption d-md-block">
                        <h5 class="animate__animated animate__fadeInDown">Second slide label</h5>
                        <p class="animate__animated animate__fadeInUp">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem, provident!</p>
                        <div class="carousel-button animate__animated animate__fadeInLeft">
                            <a class="btn btn-warning" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Slide 3">
                    <div class="carousel-caption d-md-block">
                        <h5 class="animate__animated animate__fadeInDown">Third slide label</h5>
                        <p class="animate__animated animate__fadeInUp">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, enim?</p>
                        <div class="carousel-button animate__animated animate__fadeInLeft">
                            <a class="btn btn-warning" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    {{-- Carousel End --}}

    <div class="container perkenalan">
        <h2>SELAMAT DATANG</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates, totam? Nam tenetur deleniti aut fuga
            incidunt, suscipit dolor adipisci non illo assumenda. Iure totam natus quaerat vitae, temporibus aliquam
            suscipit?</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 blog-wrap">
                <div class="flex-row">

                    <!-- Artikel Pertama -->
                    <div class="berita-box">
                        <article>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h6 class="category text-info">
                                        <a href="#" rel="tag">
                                            Uncategorized
                                        </a>
                                    </h6>
                                    <h2><a href="#">Judul Berita Pertama</a></h2>
                                    <p class="meta">
                                        <span class="date">Tanggal: 01 Januari 2023</span>
                                        <span class="author">Penulis: John Doe</span>
                                    </p>
                                    <p>
                                        Cupcake ipsum dolor sit amet candy canes. Halvah muffin chupa chups sweet
                                        roll jelly beans
                                        jelly candy canes muffin. Jelly beans bonbon tart tootsie roll candy canes.
                                        Muffin icing
                                        carrot cake cookie tootsie roll danish sweet jelly-o.
                                    </p>
                                </div>
                            </div>
                        </article>
                        <!-- Article Pertama End -->

                        <!-- Article Kedua -->
                        <article>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h6 class="category text-info">
                                        <a href="#" rel="tag">
                                            Uncategorized
                                        </a>
                                    </h6>
                                    <h2><a href="#">Judul Berita Kedua</a></h2>
                                    <p class="meta">
                                        <span class="date">Tanggal: 01 Januari 2023</span>
                                        <span class="author">Penulis: John Doe</span>
                                    </p>
                                    <p>
                                        Cupcake ipsum dolor sit amet candy canes. Halvah muffin chupa chups sweet
                                        roll jelly beans
                                        jelly candy canes muffin. Jelly beans bonbon tart tootsie roll candy canes.
                                        Muffin icing
                                        carrot cake cookie tootsie roll danish sweet jelly-o.
                                    </p>
                                </div>
                            </div>
                        </article>
                        <!-- Article Kedua End -->

                        <!-- Article Ketiga -->
                        <article>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h6 class="category text-info">
                                        <a href="#" rel="tag">
                                            Uncategorized
                                        </a>
                                    </h6>
                                    <h2><a href="#">Judul Berita Ketiga</a></h2>
                                    <p class="meta">
                                        <span class="date">Tanggal: 01 Januari 2023</span>
                                        <span class="author">Penulis: John Doe</span>
                                    </p>
                                    <p>
                                        Cupcake ipsum dolor sit amet candy canes. Halvah muffin chupa chups sweet
                                        roll jelly beans
                                        jelly candy canes muffin. Jelly beans bonbon tart tootsie roll candy canes.
                                        Muffin icing
                                        carrot cake cookie tootsie roll danish sweet jelly-o.
                                    </p>
                                </div>
                            </div>
                        </article>
                        <!-- Article Ketiga -->
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div class="container footer">
        <div class="row">
            <div class="col-md-6" id="contact-us">
                <h4>Contact Us</h4>
                <address>
                    <p>Email: <a href="mailto:info@perpus-sejahtera.id">info@perpus-udb.ac.id</a></p>
                    <p>Alamat: Jl. Bhayangkara No. 55</p>
                    <p>Kel. Tipes, Kec. Serengan, Kota Surakarta</p>
                    <p>Jawa Tengah, 57154</p>
                </address>
            </div>
            <div class="col-md-6 text-end">
                <h4>Our Social Media</h4>
                <ul class="social-media-icons mt-3">
                    <li><a href="https://www.facebook.com/universitasdutabangsa/" target="_blank"><i
                                class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/udbofficial" target="_blank"><i
                                class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="https://instagram.com/udb.official" target="_blank"><i
                                class="fa-brands fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="back-to-top" id="back-to-top-btn">
        <a href="#">
            <div class="circle">
                <span>&#9650;</span>
            </div>
        </a>
    </div>
@endsection

@section('sub-footer')
    <div class="sub-footer">
        <div class="container copyright">
            <p>&copy; 2023 Dikelola Tim IT <strong>Universitas Duta Bangsa Surakarta</strong> All Rights Reserved.</p>
        </div>
    </div>
@endsection
