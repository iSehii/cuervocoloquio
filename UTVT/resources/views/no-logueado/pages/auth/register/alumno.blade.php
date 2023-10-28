@extends('Inicio')
@push('estilos')
    <link rel="stylesheet" href="{{ asset('css/Paginas/Registro/Alumno.css') }}">
    <script src="{{ asset('js/registro/alumno.js') }}"></script>
@endpush
@section('Contenido')
    <div class="Div">
        <div class="contenedorCat">

            <br>
            <h1>Registro</h1>
            <h3>Crea tu cuenta Cuervo, es gratis y solo te tomará un minuto.</h3>
            <form action="/pgs/auth/register/alumno/index.php" id="Formulario" method="post">
                <div class="inputs" style="margin: 0 auto">
                    <div class="cajas" style="margin: 0 auto">
                        <div class="renglon">
                            <h10 id="IzqTextH">
                                <h10>Nombre:</h10><br>
                                <input type="text" oninput="Apellidos()" name="nombre" placeholder="Ej: Juan"
                                    id="nombre"> <br>
                                <h10 style="visibility: hidden">Hola como estás</h10>
                        </div>
                        <div class="renglon">
                            <h10 id="IzqTextH">
                                <h10>Apellido paterno:</h10><br>
                                <input type="text" oninput="Apellidos()" name="Apellido_paterno"
                                    placeholder="Apellido paterno" id="apellidop"><br>
                                <h10 style="visibility: hidden">Hola como estás</h10>
                        </div>
                        <div class="renglon">
                            <h10 id="IzqTextH">
                                <h10>Apellido materno:</h10><br>
                                <input type="text" oninput="Apellidos()" name="Apellido_materno"
                                    placeholder="Apellido materno" id="apellidom"> <br>
                                <h10 style="visibility: hidden">Hola como estás</h10>
                        </div>
                        <div class="renglon">
                            <h10 id="IzqTextH">
                                <h10>Matrícula:</h10><br>
                                <input type="text" name="matricula"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, ''); matriculas();"
                                    placeholder="Matricula" id="Matricula"> <br>
                                <h10 id="matriText"></h10><br>
                        </div>
                        <div class="renglon" style="">
                            <h10 id="IzqTextH">
                                <h10>Correo:</h10><br>
                                <input type="text" name="correo" style="" onkeyup="validarCorreo();"
                                    placeholder="Correo" id="correo"> <br>
                                <h10 style="" id="correoText">Hola como estás</h10>
                        </div>
                        <div class="renglon">
                            <h10 id="IzqTextH">
                                <h10>Teléfono:</h10><br>
                                <input type="text" name="telefono"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, ''); telefonos();"
                                    placeholder="Teléfono" id="telefono"> <br>
                                <h10 id="celText"></h10><br>
                        </div>
                        <div class="renglon">
                            <h10 id="IzqTextH">
                                <h10>Contraseña:</h10><br>
                                <input style="" type="password" name="pass" onkeyup="validarpass();"
                                    placeholder="Contraseña" id="pass"> <br>
                                <h10 style="visibility: hidden">Hola como estás</h10>
                        </div>
                        <div class="renglon">
                            <h10 id="IzqTextH">
                                <h10>Confirmar:</h10><br>
                                <input style="" type="password" name="pass2" onkeyup="validarpass();"
                                    placeholder="Repetir contraseña" id="pass2">
                                <h10 id="passText">Hola como estás</h10>
                        </div>
                        <div class="renglon">
                            <h10 id="IzqTextH">
                                <h10>Género:</h10><br>
                                <select onchange="gener();" name="genero" style="padding: 10px 5px;"> <br>
                                    <option value="" disabled selected>Selecciona tu género</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                        </div>
                        <div class="renglon" id="asd" style="">
                            <h10 id="IzqTextH">
                                <h10>Fecha de nacimiento:</h10><br>
                                <input type="date" onchange="fecha();" name="Fecha_nacimiento"
                                    placeholder="Fecha nacimiento" id="fecha_nacimiento">
                                <h10 id="dateText"></h10>
                        </div>
                        <div class="renglon" style="margin-top: 10px">
                            <h10 id="fnText" style="font-weight: bold">Carrera:</h10>
                            <select name="carrera" onchange="Carrera();" style="padding: 10px 5px;">
                                <option value="" disabled selected>Selecciona tu carrera</option>
                                @foreach ($carreras as $carrera)
                                    <option value="{{ $carrera->id }}">{{ $carrera->Clave }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="renglon Cuatrimestre" style="margin-top: 10px">
                            <h10 id="IzqTextH">
                                <h10>Cuatrimestre:</h10><br>
                                <select name="Cuatri" onchange="cuatrimestre();" style="padding: 10px 5px;">
                                    <br>
                                    <option value="" disabled selected>Selecciona tu cuatrimestre</option>
                                </select>
                        </div>
                        <div class="renglon TSU" style="margin-top: 10px">
                            <h10>Cuatrimestre:</h10>
                            <select name="Cuatri" onchange="cuatrimestre();" style="padding: 10px 5px;">
                                <option value="" disabled selected>Selecciona tu cuatrimestre</option>
                                @foreach ($cuatrimestres->take(6) as $cuatrimestre)
                                    <option value="{{ $cuatrimestre->Cuatrimestre }}">{{ $cuatrimestre->Cuatrimestre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="renglon IG" style="margin-top: 10px; font-weight: bold">
                            <h10>Cuatrimestre:</h10>
                            <select name="Cuatri" onchange="cuatrimestre()" style="padding: 10px 5px;">
                                <option value="" disabled selected>Selecciona tu cuatrimestre</option>
                                @foreach ($cuatrimestres->slice(6, 5) as $cuatrimestre)
                                    <option value="{{ $cuatrimestre->Cuatrimestre }}">{{ $cuatrimestre->Cuatrimestre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="renglons Grupo" style="margin-top: 15px; font-weight: bold">
                            <h10>Selecciona tu grupo:</h10>
                            <select name="Grupo" style="padding: 10px 5px;">
                                <option value="" disabled selected>Selecciona tu grupo</option>
                            </select>
                        </div>

                        @foreach ($gruposChunked as $gruposGroup)
                            <div class="renglons grupos{{ $loop->index + 1 }}" style="margin-top: 15px; font-weight: bold">
                                <h10>Selecciona tu grupo:</h10>
                                <div style="">
                                    <select name="grupo{{ $loop->index + 1 }}" onchange="grupillo(this)" style="padding: 10px 5px;">
                                        <option value="" disabled selected>Selecciona tu grupo</option>
                                        @foreach ($gruposGroup as $grupo)
                                            <option value="{{ $grupo->id_grupo }}">{{ $grupo->Clave }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div style="margin: 0 auto;text-align: center; align-items: center">
                    <center>
                        <br> <br>

                        <input name="grupoF" id="grupoF" type="hidden">
                        <button class="botonSubir boton" onclick="finalizarSubida();" id="subir"
                            data-sitekey="6LeX3xgnAAAAAFebwXHX9VvzviDi-B_T40u4qG_N" data-callback='finalizarSubida'
                            data-action='submit'>Subir</button>
                    </center>
                    <br> <br>
                    <div align="left">
                        <label id="submitText"></label>
                    </div>
                </div>
        </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>

    </div>
@endsection
