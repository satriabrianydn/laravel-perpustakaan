@extends('layouts.main')
@section('title', 'Perpustakaan | Horror')

@section('main')
    <div class="container mt-3">
        <div class="box-category">
            <h4 class="mb-4">HORROR</h4>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @forelse ($books as $book)
                    <div class="col">
                        <div class="card h-100 small-card">
                            <img src="{{ asset('storage/' . ($book->foto_buku ?? 'covers/no_image_available.png')) }}"
                                class="card-img-center" alt="Cover Buku">
                            <div class="card-body">
                                <h5 class="card-title">Judul: {{ $book->nama_buku }}</h5>
                                <p class="card-text">Pengarang: {{ $book->nama_pengarang }}</p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat nam
                                    culpa eum eos ab sit laudantium sint quasi qui similique dignissimos eligendi possimus
                                    perspiciatis, debitis dolore in aliquid, sapiente doloremque.</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-body">
                                <p class="card-text">Belum ada buku dalam kategori ini.</p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
