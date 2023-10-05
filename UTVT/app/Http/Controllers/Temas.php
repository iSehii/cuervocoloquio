<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Temas extends Controller
{
    function CambiarTema() {
        if (session('oscuro') === true) {
            session(['oscuro' => false]);
        } else {
            session(['oscuro' => true]);
        }
    }
}
