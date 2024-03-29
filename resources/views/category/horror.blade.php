@extends('layouts.main')
@section('title', 'Perpustakaan | Horror')

@section('main')
    <div class="container mt-3">
        <div class="box-category">
            <h4 class="mb-4">HORROR</h4>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @forelse ($books as $book)
                    <div class="col">
                        <div class="card h-60 small-card text-center" style="align-items: center">
                            <img src="{{ asset('storage/' . ($book->foto_buku ?? 'covers/no_image_available.png')) }}"
                                class="card-img-center" alt="Cover Buku" style="margin-top: 20px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->nama_buku }}</h5>
                                <p class="card-text">{{ $book->nama_pengarang }}</p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text">
                                    Deskripsi : <span class="short-description">{{ Str::limit($book->deskripsi, 100) }}</span>
                                </p>
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
