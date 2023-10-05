    <div class="encabezado">
         <div class="barra">
             <div id="menu" class="menu" style="cursor: pointer; z-index: 999" onclick="Menu()">
                 <span class="material-symbols-outlined">
                     menu
                 </span>
             </div>
             <a href="{{ route('inicio') }}">
                 <div class="inicio" id="inicio" style="cursor: pointer">
                    <img class="logoDesktop" src="{{ asset('/imagenes/behuse-logos/behuse-logotipo.png') }}">
                    <img class="logo" src="{{ asset('/imagenes/behuse-logos/behuse-logo.png') }}">
                </div>
            </a>
             <a href="{{ route('login') }}" style="font-weight: bold">
                 <div class="auth-links">
                     <div class="login">
                         Iniciar sesión
                     </div>
             </a>
             <a href="{{ route('registro') }}">
                 <div class="register" style="font-weight: bold">
                     Registrarse
                 </div>
            </a>
            <div class="configuracion" style="font-weight: bold" id="configuracion" onclick="preferencias();">
                <span class="material-symbols-outlined">
                    settings
                </span>
            </div>
         </div>
     </div>
     </div>


