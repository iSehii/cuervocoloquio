<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Carreras extends Controller
{
    function DSM () {
        
    }
    public function Carreras ($carrera) {
        $Titulo = $carrera;
        $Carreras = true;
        if (session()->get('logueado') == true) {
            return redirect('/');
        } else {
            return view('no-logueado/pages/carreras', compact('Titulo', 'Carreras'));
        }
    }
}
