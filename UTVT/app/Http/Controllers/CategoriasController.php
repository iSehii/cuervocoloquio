<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\publicaciones;


class CategoriasController extends Controller
{
    public function Filtros() {   
        $etiquetas = publicaciones::select('tags')->get();
        $Pruebas = "Etiqueta de publicacion|Ruaro|Marco|Javascript|Matematicas";
        $string = explode("|", $Pruebas);

        $Titulo = 'Categorias';
        $Categorias = true;
        if (session()->get('logueado') == true) {
            return redirect('/');
        } else {
            return view('no-logueado.pages.categorias.inicio', compact('Titulo', 'Categorias', 'string'));
        }
    }
}
