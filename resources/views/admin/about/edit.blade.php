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
            <h2 class="mb-4">Edit About Form</h2>
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.about.update', $about) }}">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{ $about->name }}">
                </div>
                <div class="mb-3">
                    <label for="departement" class="form-label">Departement</label>
                    <input type="text" class="form-control" id="departement" name="departement" placeholder="Enter your departement" value="{{ $about->departement }}">
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
