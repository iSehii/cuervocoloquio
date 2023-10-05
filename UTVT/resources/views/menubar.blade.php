@php
    $Inicio = empty($Inicio) ? "." : "selected";
    $Categorias = empty($Categorias) ? "" : "selected";
    $Carreras = empty($Carreras) ? "" : "selected";
    $Materias = empty($Materias) ? "" : "selected";
    $Usuarios = empty($Usuarios) ? "" : "selected";
    $Publicaciones = empty($Publicaciones) ? "" : "selected";
@endphp
<div class="menuBar">
    <div class="izquierda" id="izquierda">
        <div class="contenidoIzq">
            <a href="{{ route('inicio') }}">
                <div class="izqCat {{ $Inicio }}">
                    <span class="material-symbols-outlined">
                        home
                    </span>
                    <span class="textoIzq">Inicio</span>
                </div>
            </a>
            <a href="{{ route('categorias') }}">
                <div class="izqCat {{ $Categorias}}">
                    <span class="material-symbols-outlined">
                        category
                    </span>
                    <span class="textoIzq">Categorías</span>
                </div>
            </a>
            <a href="{{ route('carreras') }}">
                <div class="izqCat {{ $Carreras }}">
                    <span class="material-symbols-outlined">
                        school
                    </span>
                    <span class="textoIzq">Carreras</span>
                </div>
            </a>
            <a href="{{ route('materias') }}">
                <div class="izqCat {{ $Materias }}">
                    <span class="material-symbols-outlined">
                        book_4
                    </span>
                    <span class="textoIzq">Materias</span>
                </div>
            </a>
            <a href="{{ route('usuarios') }}">
                <div class="izqCat {{ $Usuarios }}">
                    <span class="material-symbols-outlined">
                        group
                    </span>
                    <span class="textoIzq">Usuarios</span>
                </div>
            </a>
            <a href="{{ route('publicaciones') }}">
                <div class="izqCat {{ $Publicaciones }}">
                    <span class="material-symbols-outlined">
                        public
                    </span>
                    <span class="textoIzq">Publicaciones</span>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="preferencias" id="preferencias" name="preferencias">
    <div class="contenidoIzq">
        <div class="izqCat">
        <span class="material-symbols-outlined">
                language
            </span>
        <span class="textoIzq">Idioma</span>
        </div>
        <a href="#" id="cambiar-tema-link">
        <div class="izqCat">
        <span class="material-symbols-outlined">
                dark_mode
        </span>
        <span class="textoIzq">Modo oscuro </span>
            <label class="switch" id="switch">
                <input type="checkbox" value="" @if (session('oscuro') == true)
                    {{ "checked" }}
                @endif>
                <span class="slider round">
                </span>
            </label>
        </div>
    </a>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#cambiar-tema-link').on('input', function (e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('cambiar-tema') }}',
                method: 'GET',
                success: function (response) {
                    var linkEstilo = document.getElementById('miEstilo');
                    if (linkEstilo.href == "{{ asset('/css/oscuro/Layout.css') }}") {
                        linkEstilo.href = "{{ asset('/css/Layout.css') }}";
                    } else {
                        linkEstilo.href = "{{ asset('/css/oscuro/Layout.css') }}";
                    }
                },
                error: function (error) {
                    console.error('Error al cambiar el tema', error);
                }
            });
        });
    });
</script>