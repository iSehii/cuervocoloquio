@push('estilos')
    <link rel="stylesheet" href="{{ asset('css/Paginas/Carreras/Carreras.css') }}">
@endpush
@extends('Inicio')
@section('Contenido')
    <div class="centro categoriasCARRERA">
        <div class="contenedorCat">
            <h1>Carreras</h1>
            <h3>Selecciona tu carrera para buscar las respectivas publicaciones</h3>
            <div class="categorias">
                <div class="carr DSM">
                    <a href="{{ route('carrera', ['carrera' => 'dsm']) }}">
                        <button>Desarrollo de Software Multiplataforma</button>
                    </a>
                </div>
                <div class="carr IGDSM">
                    <a href="{{ route('carrera', ['carrera' => 'igdsm']) }}">
                        <button onclick="IGDSSM()">Ingenieria en Desarrollo de Software Multiplataforma</button>
                    </a>
                </div>
                <div class="carr IRD">
                    <a href="{{ route('carrera', ['carrera' => 'ird']) }}">
                        <button onclick="IRDD()">Infraestructura de Redes Digitales</button>
                    </a>
                </div>
                <div class="carr IGIRD">
                    <a href="{{ route('carrera', ['carrera' => 'igird']) }}">
                        <button onclick="IGIRDD()">Ingenieria de Infraestructura de Redes Digitales</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
