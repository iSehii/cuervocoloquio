@php
    $Titulo = "No encontrado";
@endphp
@push('estilos')
    <link rel="stylesheet" href="{{ asset('css/errors/Error.css') }}">
@if(session('oscuro') !== null && session('oscuro') == true)
    <link id="miEstilo" rel="stylesheet" href="{{ asset('/css/oscuro/Layout.css') }}">
@else
    <link id="miEstilo" rel="stylesheet" href="{{ asset('/css/Layout.css') }}">
@endif
@endpush
@extends('Inicio')
@section('Contenido')
    <center>
        <div class="Error">
            <h1>Verifica la ruta.</h1>
            <div class="Imagen">
                <img src="{{ asset('imagenes/Cuervo.png') }}" width="200px" alt="Imagen no encontrada.">
            </div>
            Página no encontrada, por favor ir a https:www.behuse.com
        </div>
        </center>
@endsection
