<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrerasController extends Controller
{
    public function Carreras($carrera)
    {   $sesion_iniciada;
        $datos = [];
        $vista = '';
        $Titulo = $carrera;
        $Carreras = true;
        if ($carrera == 'dsm' || $carrera == 'ird' || $carrera == 'igdsm' || $carrera == 'igird') {
            $vista = '';
            switch ($carrera) {
                case 'dsm':
                    $TituloCarrera = "Desarrollo de Software Multiplataforma";
                    $Clave = "DSM";
                    break;
                case 'ird':
                    $TituloCarrera = "Infraestructura de Redes Digitales";
                    $Clave = "IRD";
                    break;
                case 'igdsm':
                    $TituloCarrera = "Ingenieria en Desarrollo y Gestión de Sotware";
                    $Clave = "IGDGS";
                    break;
                case 'igird':
                    $TituloCarrera = "Ingenieria en Ciberseguridad y Redes Inteligentes";
                    $Clave = "IGCyRI";
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
            } else {
                $sesion_iniciada = false;
            }
        return view($vista, compact('Titulo', 'Carreras', 'datos', 'sesion_iniciada'));
    }
}
