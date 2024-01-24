@extends('layouts.main')
@section('title', 'Halaman Utama | Perpustakaan Online Universitas Duta Bangsa Surakarta')
@section('body')
    <div class="fakeLoader"></div>
@endsection


@section('main')
    {{-- Carousel --}}
    {{-- <div class="carousel">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Slide 1">
                    <div class="carousel-caption d-md-block">
                        <h5 class="animate__animated animate__fadeInDown">Universitas Duta Bangsa Surakarta</h5>
                        <div class="animate__animated animate__fadeInUp">
                            <p>Terima kasih telah memilih Perpustakaan Universitas Duta Bangsa sebagai mitra pendidikan dan
                                penelitian Anda.</p>
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
                        <p class="animate__animated animate__fadeInUp">Kami berkomitmen untuk terus meningkatkan layanan
                            kami demi mendukung kesuksesan akademis Anda.</p>
                        <div class="carousel-button animate__animated animate__fadeInLeft">
                            <a class="btn btn-warning" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Slide 3">
                    <div class="carousel-caption d-md-block">
                        <h5 class="animate__animated animate__fadeInDown">Motivasi Belajar</h5>
                        <p class="animate__animated animate__fadeInUp">Mari berlayar melalui kata-kata dan biarkan setiap
                            halaman membawa kita lebih dekat pada versi terbaik dari diri kita.</p>
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
    </div> --}}
    {{-- Carousel End --}}

    <div class="container perkenalan">
        <h2>SELAMAT DATANG</h2>
        <p>Sebuah pusat pengetahuan yang berkomitmen untuk memberikan layanan terbaik dalam mendukung pembelajaran,
            penelitian, dan pengembangan masyarakat. Sebagai bagian integral dari Universitas Duta Bangsa, perpustakaan kami
            menjadi pusat informasi yang dinamis, memberikan akses luas terhadap berbagai sumber daya akademis untuk
            memperkaya pengalaman belajar setiap mahasiswa dan peneliti.</p>
    </div>

    {{-- <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 blog-wrap">
                <div class="flex-row">

                    <!-- Artikel Pertama -->
                    <div class="berita-box">
                        <article>
                            <div class="card-small-card" style="align-items: center">
                        </article>
                    </div>

                </div>
            </div>
        </div>
    </div> --}}
    </div>
@endsection


