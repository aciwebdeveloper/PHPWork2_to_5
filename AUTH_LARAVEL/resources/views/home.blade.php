@extends("layout.home.app")
@section("title","HOME | template")

@section("content")

@if (auth()->check())

{{auth()->user()->name}}

@endif

@endsection
