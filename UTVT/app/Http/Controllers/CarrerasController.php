<?php

namespace App\Http\Controllers;
use App\Models\publicaciones;
use Illuminate\Http\Request;

class CarrerasController extends Controller
{
    public function Carreras($carrera)
    {   $sesion_iniciada;
        $datos = [];
        $PublicacionesVacias = false;
        $vista = '';
        $Titulo = $carrera;
        $Carreras = true;
        if ($carrera == 'dsm' || $carrera == 'ird' || $carrera == 'igdsm' || $carrera == 'igird') {
            $vista = '';
            switch ($carrera) {
                case 'dsm':
                    $TituloCarrera = "Desarrollo de Software Multiplataforma";
                    $Clave = "DSM";
                    $Id_Carrera = 1;
                    break;
                case 'ird':
                    $TituloCarrera = "Infraestructura de Redes Digitales";
                    $Clave = "IRD";
                    $Id_Carrera = 2;
                    break;
                case 'igdsm':
                    $TituloCarrera = "Ingeniería en Desarrollo y Gestión de Software";
                    $Clave = "IGDGS";
                    $Id_Carrera = 3;
                    break;
                case 'igird':
                    $TituloCarrera = "Ingeniería en Ciberseguridad y Redes Inteligentes";
                    $Clave = "IGCyRI";
                    $Id_Carrera = 4;
                    break;
            }
            $vista = 'no-logueado.pages.carreras.carrera';
                $datos = [
                    "TituloCarrera" => $TituloCarrera,
                    "Clave" => $Clave
                ];
                $Titulo = $Clave;
        } else {
            $vista = 'errors.Error';
        }
            if (session()->get('logueado') == true) {
                $sesion_iniciada = true;
                $Publicacion = publicaciones::where('id_carrera', $Id_Carrera)->orderBy('id', 'desc')->paginate(10);
            } else {
                $Publicacion = publicaciones::where('id_carrera', $Id_Carrera)->where('Publica', 1)->paginate(10);
                $sesion_iniciada = false;
            }
        
        if (!$Publicacion) {
        $PublicacionesVacias = true;
                    }
        return view($vista, compact('Titulo', 'Carreras', 'datos', 'sesion_iniciada', 'Publicacion', 'PublicacionesVacias'));
    }
}
