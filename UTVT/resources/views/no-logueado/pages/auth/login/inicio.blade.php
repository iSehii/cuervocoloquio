@extends('Inicio')
@push('estilos')
    <link href="{{ asset('css/Paginas/Login/Inicio.css') }}" rel="stylesheet">
@endpush
@section('Contenido')
<div class="contenedorCat">
    <h1>¡Bienvenido!</h1>
    <h3>Inicia sesión para comenzar a interactuar.</h3>
    <form action="index.php" method="POST" id="form1" name="formulario">
        <div class="inputLogin">
            <label id=""><b>Correo:</b></label> <br>
            <input type="text" value="" name="correo" placeholder="Correo institucional"> <br>
            <label><b>Contraseña:</b></label> <br>
            <input value="" type="password" name="contra" placeholder="Clave de registro"> 
            <div style="text-align: center"> <br>
                <label id="logText"></label>
                <input type="hidden" id="action" name="action" value="index">
                <button>Iniciar sesión</button>
            </div>
        </div>
        {{ $Usuario[0]->Nombre }}
    </form>
</div>
@endsection
