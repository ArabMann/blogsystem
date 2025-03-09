@extends('admin.layout')

@section('content')
    @include('admin.navigation')
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
        <div class="card shadow-lg p-4">
            <h2 class="mb-4">Add News Form</h2>
            <form method="POST" enctype="multipart/form-data" action="{{ route('news.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Berita</label>
                    <textarea class="form-control" placeholder="Enter Your Description" id="description" name="description"></textarea>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
                    <select class="form-select" id="category_id" name="category_id">
                        <option selected>Pilih...</option>
                        @foreach ($category as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="image" name="image">
                    <label class="input-group-text" for="image">Upload</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
