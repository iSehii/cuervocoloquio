@push('estilos')
    <link rel="stylesheet" href="{{ asset('css/Paginas/Materias/Materias.css') }}">
@endpush
@extends('Inicio')
@section('Contenido')
    <div class="Content">
        <div class="centro">
            <div class="contenedorCat">
                <h1>Grupos</h1>
                <h3>Encuentra las materias que tiene un grupo o que cursa un usuario</h3>
                <h3 style="font-size: 20px">
                </h3>
                <div class="Materias" style="color: black">
                    <input type="hidden" id="ClickG" value="">
                    <input type="text" id="ssearchInput" oninput="" placeholder="Busca publicaciones, usuarios o grupos">
                    <div id="Sugerencia"class="Sugerencia"></div>
                    <div class="ResultadoBB" id="searchResultss"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
