@push('estilos')
    <link rel="stylesheet" href="{{ asset('css/Paginas/Carreras/Carrera.css') }}">
@endpush
@extends('Inicio')
@section('Contenido')
    <div class="Carrera">
        <div class="CarreraEncabezado">
            <h1>{{ $datos['TituloCarrera'] }}</h1>
            <h3>Aquí encontrarás contenido referente a {{ $datos['Clave'] }}</h3>
            <div>
            </div>
            <div class="Filtros">
                <div class="FiltrarPor">
                    Filtrar publicaciones:
                </div>
                <div class="Filtrado">
                    <a class="a" href="/"
                        style="border-radius: 5px 0px 0px 5px; border-left: 1px solid rgb(193, 187, 255);">
                        <div>
                            Recientes
                        </div>
                    </a>
                    <a href="/?filtro=desc" class="a">
                        <div>
                            Menos reciente
                        </div>
                    </a>
                    <div id="CuatrimestreA" onmouseover="MostrarCuatrimestre()" onmouseout="OcultarCuatrimestre()">
                        <div>
                            Cuatrimestre
                        </div>
                        <div id="CuatrimestreF" class="CuatrimestreF">
                            <a href="{{ route('inicio') }}">
                                <div class="li">Primero</div>
                            </a>
                            <a href="{{ route('inicio') }}">
                                <div class="li">Segundo</div>
                            </a>
                            <a href="{{ route('inicio') }}">
                                <div class="li">Tercero</div>
                            </a>
                            <a href="{{ route('inicio') }}">
                                <div class="li">Cuarto</div>
                            </a>
                            <a href="{{ route('inicio') }}">
                                <div class="li">Quinto</div>
                            </a>
                            <a href="{{ route('inicio') }}">
                                <div class="li">Sexto</div>
                            </a>
                            <a href="{{ route('inicio') }}">
                                <div class="li">Séptimo</div>
                            </a>
                            <a href="{{ route('inicio') }}">
                                <div class="li">Octavo</div>
                            </a>
                            <a href="{{ route('inicio') }}">
                                <div class="li">Noveno</div>
                            </a>
                            <a href="{{ route('inicio') }}">
                                <div class="li">Décimo</div>
                            </a>
                            <a href="{{ route('inicio') }}">
                                <div class="li">Onceavo</div>
                            </a>
                        </div>
                    </div>
                    <script>
                        var CuatrimestresVisible = false;

                        function MostrarCuatrimestre() {
                            var CuatrimestreF = document.getElementById('CuatrimestreF');
                            CuatrimestreF.style.display = "block";
                            CuatrimestresVisible = true;
                        }

                        function OcultarCuatrimestre() {
                            if (!CuatrimestresVisible) {
                                var CuatrimestreF = document.getElementById('CuatrimestreF');
                                CuatrimestreF.style.display = "none";
                            }
                        }
                        document.getElementById('CuatrimestreF').addEventListener('mouseover', function() {
                            CuatrimestresVisible = true;
                        });
                        document.getElementById('CuatrimestreF').addEventListener('mouseout', function() {
                            CuatrimestresVisible = false;
                            OcultarCuatrimestre();
                        });
                        document.getElementById('CuatrimestreA').addEventListener('mouseout', function(event) {
                            var relatedTarget = event.relatedTarget;
                            if (relatedTarget !== null && !relatedTarget.closest("#CuatrimestreF")) {
                                CuatrimestresVisible = false;
                                OcultarCuatrimestre();
                            }
                        });
                    </script>

                    <div href="" id="CarreraA" onmouseover="MostrarCarrera()" onmouseout="OcultarCarrera()">
                        <div onmouseover="MostrarCarrera()" onmouseout="OcultarCarrera()">
                            Carrera
                        </div>
                        <div id="CarreraF" class="CarreraF">
                            <?php
                            
                            ?>
                        </div>
                        </a>
                    </div>

                    <script>
                        var carrerasVisible = false;

                        function MostrarCarrera() {
                            var CarreraF = document.getElementById('CarreraF');
                            CarreraF.style.display = "block";
                            carrerasVisible = true;
                        }

                        function OcultarCarrera() {
                            if (!carrerasVisible) {
                                var CarreraF = document.getElementById('CarreraF');
                                CarreraF.style.display = "none";
                            }
                        }

                        // Cuando el mouse está sobre CarreraF, asegurémonos de mantenerlo visible
                        document.getElementById('CarreraF').addEventListener('mouseover', function() {
                            carrerasVisible = true;
                        });

                        // Cuando el mouse sale de CarreraF, ocultémoslo si el mouse tampoco está sobre CarreraA
                        document.getElementById('CarreraF').addEventListener('mouseout', function() {
                            carrerasVisible = false;
                            OcultarCarrera();
                        });

                        // Cuando el mouse sale de CarreraA, ocultémoslo si el mouse tampoco está sobre CarreraF
                        document.getElementById('CarreraA').addEventListener('mouseout', function(event) {
                            var relatedTarget = event.relatedTarget;
                            if (relatedTarget !== null && !relatedTarget.closest("#CarreraF")) {
                                carrerasVisible = false;
                                OcultarCarrera();
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div class="PublicacionesDiv">
        <div class="Publicaciones">
            <div class="">
                <label class="VistasP"><label>
                        0 respuestas
                    </label></label>
                <article class="NumeroPTitulo">
                    <a href="">
                        Prueba de contenido y titulo
                        </span>
                    </a>
                    <span class="NumeroP">
                        1
                    </span>
                </article>
                <article class="ContenidoPublicacion">
                    <span class="ContenidoP" align="justify">
                        Bienvenido a las pruebas de contenido en publicaciones
                    </span>
                </article>
                <article class="UltimoP">
                    <article class="CaracteristicasP">
                        <article>
                            <span class="AbiertaP">
                                Abierta
                            </span>
                        </article>
                        <article>
                            <span>
                                {{ $datos['TituloCarrera'] }}
                            </span>
                        </article>
                        <article>
                            <span>
                                Cuarto
                            </span>
                        </article>
                    </article>
                    <div class="CreacionModificaciones">
                        <div class="NombreUP">
                            <a href="">
                                <span>
                                    <img src="{{ asset('imagenes/Cuervo.png') }}" width="20px"
                                        height="20px" style="margin-bottom: -4px ;border-radius: 3px"> Cervantes Hinojosa
                                    Gahandi Sebastian
                                </span>
                            </a>
                        </div>
                        <div class="ModificacionesAP">
                            <span class="ModificacionesP"> Sin modificaciones
                            </span>
                            <article class="CreacionAP">

                                <span>
                                    Publicado hace unos segundos.
                                </span>

                            </article>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection
