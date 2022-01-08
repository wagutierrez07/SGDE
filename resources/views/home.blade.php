@extends('layouts.app')

@section('content')

<h1 class="fw-bold">Bienvenido! {{Auth::user()->usuario}}</h1>
    <p>Este es un modal de administrador</p>
    <script src="{{ asset('js/app.js') }}"></script>

@endsection