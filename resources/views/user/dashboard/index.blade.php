@extends('user.layout')

@section('content')
    @include('user.navigation')
    {{-- @include('user.components.carousel') --}}
    @include('user.components.card', $datas)
@endsection
