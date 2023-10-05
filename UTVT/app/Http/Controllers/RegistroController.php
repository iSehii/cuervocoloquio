<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\Registro;

class RegistroController extends Controller
{
public function Enviar()
    {
    $correo = new Registro();
    
    Mail::to('gsch.sehi@gmail.com')->send($correo);
    
    return response()->json(['message' => 'Correo enviado correctamente']);
    }
}