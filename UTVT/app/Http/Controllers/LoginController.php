<?php

namespace App\Http\Controllers;
use App\Models\usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Login() {
    $Titulo = "Iniciar sesión";
    $oscuro = true;
    $Usuarios = true;
    if (session()->get('logueado') == true) {
        return redirect('/');
    } else {
        $Usuario = usuario::where('id', 1)->get();
        return view('no-logueado/pages/auth/login/inicio', compact('Titulo', 'Usuarios', 'oscuro', 'Usuario'));
    }
    }
}
