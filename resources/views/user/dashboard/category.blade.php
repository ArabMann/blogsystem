@extends('user.layout')

@section('content')
    @include('user.navigation', $categories)
    {{-- @include('user.components.carousel') --}}
    @include('user.components.card', $datas)
@endsection
