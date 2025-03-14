@extends('admin.layout')

@section('content')
    @include('admin.navigation')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Data Category</h2>
            <a href="{{ route('admin.category.create') }}" class="btn btn-success">+ Add Data</a>
        </div>
        <div class="card shadow-lg">
            <div class="card-body">
                <table class="table table-hover table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>
                                    <a href="{{ route('admin.category.edit', $data) }}"
                                        class="btn btn-sm btn-outline-primary">Edit</a>

                                    <form action="{{ route('admin.category.destroy', $data) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this category?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
