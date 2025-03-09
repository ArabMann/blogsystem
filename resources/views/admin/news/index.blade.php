@extends('admin.layout')

@section('content')
    @include('admin.navigation')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Writing</h2>
            <a href="{{ route('admin.news.create') }}" class="btn btn-success">+ Add Data</a>
        </div>
        <div class="card shadow-lg">
            <div class="card-body">
                <table class="table table-hover table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Writer</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Action  </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        {{-- @php
                            dd($data)
                        @endphp --}}
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->user->name }}</td>
                                <td>{{ $data->description }}</td>
                                <td>{{ $data->category->name }}</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><a href="{{ route("admin.news.edit", $data) }}">Edit</a></button>
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
