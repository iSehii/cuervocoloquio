@php
    $Titulo = "No encontrado";
@endphp
@push('estilos')
    <link rel="stylesheet" href="{{ asset('css/errors/Error.css') }}">
@endpush
@extends('Inicio')
@section('Contenido')
    <center>
        <div class="Error">
            <h1>¿Problemas encontrando la página solicitada?.</h1>
            <div class="Imagen">
                <img src="{{ asset('imagenes/Cuervo.png') }}" width="200px" alt="Imagen no encontrada.">
            </div>
            Página no encontrada, por favor ir a https:www.behuse.com
        </div>
        </center>
@endsection
