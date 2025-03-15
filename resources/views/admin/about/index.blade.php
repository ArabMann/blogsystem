@extends('admin.layout')

@section('content')
    @include('admin.navigation')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Writing</h2>
            <a href="{{ route('admin.about.create') }}" class="btn btn-success">+ Add Data</a>
        </div>
        <div class="card shadow-lg">
            <div class="card-body">
                <table class="table table-hover table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Departement</th>
                            <th>Image</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($abouts as $data)
                            {{-- @php
                            dd($data)
                        @endphp --}}
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->departement }}</td>
                                <td>
                                    <img src="{{ Storage::url($data->image) }}" alt="{{ $data->name }}"
                                        style="width: 80px; height: 80px; object-fit: cover;" class="rounded shadow-sm" />
                                </td>

                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><a
                                            href="{{ route('admin.about.edit', $data) }}">Edit</a></button>
                                    <form action="{{ route('admin.about.destroy', $data) }}" method="POST" enctype="multipart/form-data"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this about?');">
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
