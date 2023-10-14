@extends('Inicio')
@push('estilos')
    <link href="{{ asset('css/Paginas/Registro/Inicio.css') }}" rel="stylesheet">
@endpush
@section('Contenido')
            <div class="centro">
                <div class="titleRol" style="">
                    <h1 style="text-align: center; font-weight: 600; font-family: 'Quicksand', sans-serif;">¡Escoge tu
                        rol para poder registrarte!</h1>
                </div>
                <div class="Seleccion">
                    <div class="SeleccionCentro">
                        <div class="Docente" onclick="Docente();">
                            <script>
                                function Docente() {
                                    setTimeout(() => {
                                        window.location.href = ""
                                    }, 300);
                                }

                                function Alumno() {
                                    setTimeout(() => {
                                        window.location.href = "{{ route('registroAlumno') }}"
                                    }, 300);
                                }
                            </script>
                            <div class="textoDoc">
                                <h1>Docente</h1>
                            </div>
                            <div class="imgDoc" style=""><img src="{{ asset('imagenes/profesor.jpg') }}"
                                    alt="No disponible"></div>
                        </div>
                        <div class="Alumno" onclick="Alumno();">
                            <div class="textoAlu">
                                <h1>Alumno</h1>
                            </div>
                            <div class="imgAlu"style=""><img src="{{ asset('imagenes/Birrete.jpg') }}"
                                    alt="No disponible"></div>
                        </div>
                        <div class="DocenteCEL" onclick="Docente();">
                            <div class="textoDoc">
                                <h1>Docente</h1>
                            </div>
                            <div class="imgDocCEL" style=""><img src="{{ asset('imagenes/profesor.jpg') }}"
                                    alt="No disponible"></div>
                            <div class="DocabsolutCEL">
                                <h5>Docente</h5>
                            </div>
                        </div>
                        <div class="AlumnoCEL" onclick="Alumno();">
                            <div class="textoAlu">
                                <h1>Alumno</h1>
                            </div>
                            <div class="imgAluCEL" style=""><img src="{{ asset('imagenes/Birrete.jpg') }}"
                                    alt="No disponible"></div>
                            <div class="AluabsolutCEL">
                                <h5>Alumno</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
