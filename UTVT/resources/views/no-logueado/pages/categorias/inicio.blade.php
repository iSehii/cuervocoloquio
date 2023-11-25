@push('estilos')
    <link rel="stylesheet" href="{{ asset('css/Paginas/Categorias/inicio.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
@endpush
@extends('Inicio')
@section('Contenido')
<div>
    <div>
        <div class="Categorias">
            <h1>Categorías - Inicio</h1>
            <div class="Busqueda">
                <input type="text" placeholder="Buscar o filtrar" name="" id="" class="Find">
                <span class="material-symbols-outlined">
                    search
                </span>
            </div>
            <div class="Etiquetas">
                <label>Etiquetas:</label>
                <div class="Tags">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($string as $etiquetas)
                    <a href="{{ route('inicio', $string[$i]) }}">
                        <div class="Text"><label>{{ $string[$i] }}</label></div>
                    </a>
                    @php
                        $i = $i+1;
                    @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
