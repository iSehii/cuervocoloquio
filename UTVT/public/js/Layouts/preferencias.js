
var preferenciasVisible = false;

function preferencias() {
    var preferencias = document.getElementById('preferencias');
    if (preferenciasVisible == false) {
        preferencias.style.animation = 'preferenciasEntrada 0.3s forwards';
        preferencias.classList.remove('preferencias');
        preferencias.classList.add('preferenciasEntrada');
        preferenciasVisible = true;
        preferencias.focus();
    } else {
        preferencias.style.animation = 'preferenciasSalida 0.3s forwards';
        preferencias.classList.remove('preferenciasEntrada');
        preferencias.classList.add('preferencias');
        preferenciasVisible = false;
    }
}

document.addEventListener('DOMContentLoaded', function () {
    var preferencias = document.getElementById('preferencias');
    var configuracion = document.getElementById('configuracion'); 
    var preferenciasVisible = false;

    configuracion.addEventListener('click', function (event) {
        event.stopPropagation(); 
        if (!preferenciasVisible) {
            preferencias.style.animation = 'preferenciasEntrada 0.3s forwards';
            preferencias.classList.remove('preferencias');
            preferencias.classList.add('preferenciasEntrada');
            preferenciasVisible = true;
            preferencias.focus();
        }
    });

    document.addEventListener('click', function (event) {
        if (!preferencias.contains(event.target) && preferenciasVisible) {
            preferencias.style.animation = 'preferenciasSalida 0.3s forwards';
            preferencias.classList.remove('preferenciasEntrada');
            preferencias.classList.add('preferencias');
            preferenciasVisible = false;
        }
    });
});


