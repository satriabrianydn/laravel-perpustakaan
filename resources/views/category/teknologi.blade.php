@extends('layouts.main')
@section('title', 'Perpustakaan | Biologi')

@section('main')
    <div class="container mt-3">
        <div class="box-category">
            <h4 class="mb-4">BIOLOGI</h4>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @forelse ($books as $book)
                    <div class="col">
                        <div class="card h-100 small-card text-center" style="align-items: center">
                            <img src="{{ asset('storage/' . ($book->foto_buku ?? 'covers/no_image_available.png')) }}" style="object-fit: cover; width: 80%; height: 90%;"
                                class="card-img-center" alt="Cover Buku">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->nama_buku }}</h5>
                                <p class="card-text">{{ $book->nama_pengarang }}</p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text">Deskripsi: {{ $book->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                <p>Belum ada buku dalam kategori ini.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
