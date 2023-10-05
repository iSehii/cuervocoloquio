<head>
    @include('/head')
    @stack('estilos')
</head>
<body>
    @include('/header')
    <div class="Contenedor">
        @include('/menubar')
        <div class="Contenido">
            @yield('Contenido')
        </div>
    </div>
    @include('/footer')
</body>
