@extends('Inicio')
@push('estilos')
    @if(session('oscuro') !== null && session('oscuro') == true)
        <link href="{{ asset('css/oscuro/Paginas/Inicio/no-logueado.css') }}" rel="stylesheet">
    @else 
        <link href="{{ asset('css/Paginas/Inicio/no-logueado.css') }}" rel="stylesheet">
    @endif
@endpush
@section('Contenido')
    <div class="InicioContent">
        <h1>¡Bienvenido a Cuervo Coloquio!</h1>
        <section class="textStart">
            <p class="introduccion">Foro de ayuda para estudiantes de la Universidad Tecnológica del Valle de Toluca (UTVT).
            </p>
        </section>
        <section class="carrerasSect">

            <p class="introduccion2">Aquí podrás encontrar respuestas a tus preguntas, compartir experiencias y colaborar con
                tus compañeros en sus dudas académicas.</p>
            <br>
            <div>
                <br>
                <p class="carr1">Las publicaciones están catalogadas por carrera</p>
                <section class="centered">
                    <div class="SectionDSM" style="background-color: rgb(1, 64, 98);">
                        <section class="redDSM" style="background-color: #0093C7;">
                            <button style=" color: white">Ingenieria en Desarrollo y Gestión de Software</button>
                        </section>
                        <section class="DSMimagen">
                            <img src="{{ asset('imagenes/IGDSM.jpg')}}">
                        </section>
                    </div>
                </section>
                <section class="centered">
                    <div class="SectionDSM">
                        <section class="DSMimagen">
                            <img src="{{ asset('imagenes/DSM.jpg') }}">
                        </section>
                        <script>
                            const DSM = "DSM";
                        </script>
                        <section onclick="CarrerasB('DSM');" class="redDSM">
                            <button style="color: white">Desarrollo de Software Multiplataforma</button>
                        </section>
                    </div>
                </section>
                <div class="InicioRegistro" align="center"> <br><br>
                    <p class="introduccion4">¡Únete para comenzar ésta experiencia Cuervo!</p>
                    <a href="registro">
                        <button>
                            Registrarse
                        </button> <br><br><br><br>
                </div>
                </a>
                <section class="centered">
                    <div class="SectionDSM" style="background-color: rgb(72, 27, 141);">
                        <section class="redDSM" style="background-color: rgb(43, 1, 98);">
                            <button>Ingenieria en Ciberseguridad y Redes Inteligentes</button>
                        </section>
                        <section class="DSMimagen">
                            <img src="{{ asset('imagenes/IGIRD.jpg') }}">
                        </section>
                    </div>
                </section>
                <section style="background-color: #0C0062;" class="centered">
                    <div class="SectionDSM">
                        <section class="DSMimagen">
                            <img src="{{ asset('imagenes/IRD.jpg') }}">
                        </section>
                        <section class="redDSM" style="background-color: #000E80;">
                            <button>Infraestructura de Redes Digitales</button>
                        </section>
                    </div>
                </section>
            </div>
            <br><br><br>
            <p class="introduccion3">Regístrate y forma parte de esta comunidad activa donde juntos superaremos cualquier
                reto académico.</p>
            <br><br><br>
        </section>
    </div>
    </div>
@endsection
