@extends('layouts.main')
@section('title', 'Halaman Utama | Perpustakaan Online Universitas Duta Bangsa Surakarta')
@section('body')
    <div class="fakeLoader"></div>
@endsection
@include('partials.navbar')

@section('main')
    {{-- Carousel --}}
    <div class="carousel">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Slide 1">
                    <div class="carousel-caption d-md-block">
                        <h5 class="animate__animated animate__fadeInDown">Universitas Duta Bangsa Surakarta</h5>
                        <div class="animate__animated animate__fadeInUp">
                            <p>Terima kasih telah memilih Perpustakaan Universitas Duta Bangsa sebagai mitra pendidikan dan penelitian Anda.</p>
                        </div>
                        <div class="carousel-button animate__animated animate__fadeInLeft">
                            <a class="btn btn-warning" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Slide 2">
                    <div class="carousel-caption d-md-block">
                        <h5 class="animate__animated animate__fadeInDown">Pelayanan Kami</h5>
                        <p class="animate__animated animate__fadeInUp">Kami berkomitmen untuk terus meningkatkan layanan kami demi mendukung kesuksesan akademis Anda.</p>
                        <div class="carousel-button animate__animated animate__fadeInLeft">
                            <a class="btn btn-warning" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Slide 3">
                    <div class="carousel-caption d-md-block">
                        <h5 class="animate__animated animate__fadeInDown">Motivasi Belajar</h5>
                        <p class="animate__animated animate__fadeInUp">Mari berlayar melalui kata-kata dan biarkan setiap halaman membawa kita lebih dekat pada versi terbaik dari diri kita.</p>
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
        <p>Sebuah pusat pengetahuan yang berkomitmen untuk memberikan layanan terbaik dalam mendukung pembelajaran, penelitian, dan pengembangan masyarakat. Sebagai bagian integral dari Universitas Duta Bangsa, perpustakaan kami menjadi pusat informasi yang dinamis, memberikan akses luas terhadap berbagai sumber daya akademis untuk memperkaya pengalaman belajar setiap mahasiswa dan peneliti.</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 blog-wrap">
                <div class="flex-row">

                    <!-- Artikel Pertama -->
<div class="berita-box">
    <article>
        <div class="row">
            <div class="col-sm-4 text-center">
                <img src="Bagus_Adi.png" alt="Kepala Perpustakaan Photo" class="member-photo" width="300" height="280">
            </div>
            <div class="col-sm-8">
                <h6 class="category text-info">
                    <a href="#" rel="tag">
                        Kepala Perpustakaan
                    </a>
                </h6>
                <h2><a href="#">BAGUS ADI</a></h2>
                <p class="meta" style="margin-bottom: 100px;">
                    <span class="author">NO.Telp: 082754265674</span>
                </p>
            </div>
        </div>
    </article>
    <!-- Anggota Pertama End -->

    <!-- Anggota Kedua -->
    <article>
        <div class="row">
            <div class="col-sm-4 text-center">
                <img src="Asep_Bastian.png" alt="Anggota Kedua Photo" class="member-photo" width="190" height="300">
            </div>
            <div class="col-sm-4">
                <h6 class="category text-info">
                    <a href="#" rel="tag">
                        Penanggung Jawab
                    </a>
                </h6>
                <h2><a href="#">ASEP BASTIAN</a></h2>
                <p class="meta" style="margin-bottom: 10px;">
                    <span class="author">NO.Telp: 085836427846</span>
                </p>
            </div>
        </div>
    </article>
    <!-- Anggota Kedua End -->

    <!-- Anggota Ketiga -->
    <article>
        <div class="row">
            <div class="col-sm-4 text-center">
                <img src="Joko_Slamet.png" alt="Anggota Ketiga Photo" class="member-photo" width="220" height="280">
            </div>
            <div class="col-sm-4">
                <h6 class="category text-info">
                    <a href="#" rel="tag">
                        Sekretaris
                    </a>
                </h6>
                <h2><a href="#">JOKO SLAMET</a></h2>
                <p class="meta" style="margin-bottom: 10px;">
                    <span class="author">NO.Telp: 089675437556</span>
                </p>
            </div>
        </div>
    </article>
    <!-- Anggota Ketiga End -->
</div>

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
