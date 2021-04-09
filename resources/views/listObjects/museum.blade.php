@extends("templates.main")

@section('title', 'Museos')

@section('header')
    @include ("templates.navbar")
@endsection

@section('information')
    @foreach($museums as $museum)
        @include("templates.card")
    @endforeach
@endsection