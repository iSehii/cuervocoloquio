<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\carrera;
use App\Models\Grupo;
use App\Mail\Registro;

class RegistroController extends Controller
{
public function Enviar()
    {
    $correo = new Registro();
    
    Mail::to('gsch.sehi@gmail.com')->send($correo);
    
    return response()->json(['message' => 'Correo enviado correctamente']);
    }
    public function CrearRegistro() {
        
    }
    public function Registro() {
    $Titulo = "Regìstrate";
    $Usuarios = true;
    if (session()->get('logueado') == true) {
        return redirect('/');
    } else {
        $Grupo = grupo::all();
        $carreras = carrera::all();
        $cuatrimestres = grupo::select('Cuatrimestre')->distinct()->get();
        $grupos = Grupo::select('id', 'Clave')->limit(22 * 5)->get();
        $gruposChunked = $grupos->chunk(5);

            return view('no-logueado/pages/auth/register/alumno', compact('Titulo', 'Usuarios', 'Grupo', 'carreras', 'cuatrimestres', 'gruposChunked'));

    }
}
}