<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Login() {
    $Titulo = "Inicia sesión";
    $oscuro = true;
    $Usuarios = true;
    if (session()->get('logueado') == true) {
        return redirect('/');
    } else {
        return view('no-logueado/pages/auth/login/inicio', compact('Titulo', 'Usuarios', 'oscuro'));
    }
    }
}
