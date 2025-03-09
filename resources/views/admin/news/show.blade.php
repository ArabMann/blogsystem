@extends('user.layout')

@section('content')
    @include('user.navigation')

    <div class="container mt-5">
        <a href="index.html" class="btn btn-secondary mb-3">Kembali</a>

        <div class="card">
            <div class="card-img-container text-center">
                <img src="{{ Storage::url($news->image) }}" class="w-100 rounded" alt="Gambar Berita" style="max-height: 400px; object-fit: contain;">

            </div>
            <div class="card-body">
                <h2 class="card-title">{{ $news->name }}</h2>
                <p class="card-text">{{ $news->description }}</p>
            </div>
        </div>
    </div>
@endsection
