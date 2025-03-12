@extends('user.layout')

@section('content')
    @include('user.navigation')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-5">
        <a href="{{ route('dashboard.index') }}" class="btn btn-secondary mb-3">Kembali</a>

        <div class="row">
            <!-- Konten Utama -->
            <div class="col-md-8">
                <!-- Card Konten Berita -->
                <div class="card mb-4">
                    <div class="card-img-container text-center">
                        <img src="{{ Storage::url($news->image) }}" class="w-100 rounded" alt="Gambar Berita"
                             style="max-height: 400px; object-fit: contain;">
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">{{ $news->name }}</h2>
                        <p class="card-text">{{ $news->description }}</p>
                    </div>
                </div>

                <!-- Komentar Section (Form & Daftar Komentar berdampingan) -->
                <div class="row mb-4">
                    <!-- Form Komentar -->
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-header">Tinggalkan Komentar</div>
                            <div class="card-body">
                                <form action="{{ route('comment.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="news_id" value="{{ $news->id }}">

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Komentar</label>
                                        <textarea name="description" class="form-control" rows="3" required></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Daftar Komentar -->
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-header">Komentar Pengunjung</div>
                            <div class="card-body" style="max-height: 300px; overflow-y: auto;">
                                @forelse ($comments as $comment)
                                    <div class="border-bottom mb-3 pb-2">
                                        <strong>{{ $comment->name }}</strong>
                                        <p class="mb-1">{{ $comment->description }}</p>
                                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                    </div>
                                @empty
                                    <p class="text-muted">Belum ada komentar.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Kanan -->
            <div class="col-md-4">
                <!-- Berita Terbaru -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        Berita Terbaru
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($dataTerbaru as $newsItem)
                            <li class="list-group-item d-flex align-items-center">
                                <img src="{{ Storage::url($newsItem->image) }}" alt="{{ $newsItem->name }}" class="me-3"
                                     style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                <a href="{{ route('news.show', $newsItem) }}">{{ $newsItem->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Berita Terfavorit -->
                <div class="card mb-4">
                    <div class="card-header bg-warning text-dark">
                        Berita Terfavorit
                    </div>
                    <ul class="list-group list-group-flush">
                        {{-- @foreach ($favoriteNews as $favorite) --}}
                            <li class="list-group-item">
                                {{-- <a href="{{ route('news.show', $favorite) }}">{{ $favorite->name }}</a> --}}
                                <a href="">udin</a>
                            </li>
                        {{-- @endforeach --}}
                    </ul>
                </div>

                <!-- Kategori Berita -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        Kategori
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($dataCategory as $category)

                            <li class="list-group-item">
                                <a href="{{ route("news.show", $category->slug) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
