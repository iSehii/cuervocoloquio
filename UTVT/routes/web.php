<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Temas;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\CarrerasController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/cambiar-tema', [Temas::class, 'CambiarTema'])->name('cambiar-tema');



Route::get('/correo', [RegistroController::class, 'Enviar']);


Route::get('/', function () {
    $Inicio = "Selected";
    if (session()->get('logueado') == true) {
        $Titulo = "Inicio";
        return view('logueado', compact('Titulo', 'Inicio'));
    } else {
        $Titulo = "Inicia sesión o regìstrate";
        return view('no-logueado/inicio', compact('Titulo', 'Inicio'));
    }
})->name('inicio');

Route::prefix('carreras')->group(function () {
    Route::get('/', function () {
        $Titulo = "Carreras";
        $Carreras = true;
        if (session()->get('logueado') == true) {
            return redirect('/');
        } else {
            return view('no-logueado/pages/carreras/carreras', compact('Titulo', 'Carreras'));
        }
    })->name('carreras');

    Route::get('/{carrera}', [CarrerasController::class, 'Carreras'])->name('carrera');
});


Route::get('registro', function () {
    $Titulo = "Regìstrate";
    $Usuarios = true;
    if (session()->get('logueado') == true) {
        return redirect('/');
    } else {   
        return view('no-logueado/pages/auth/register/inicio', compact('Titulo', 'Usuarios'));
    }
})->name('registro');



Route::get('login', function () {
    $Titulo = "Inicia sesión";
    $oscuro = true;
    $Usuarios = true;
    if (session()->get('logueado') == true) {
        return redirect('/');
    } else {
        return view('no-logueado/pages/auth/login/inicio', compact('Titulo', 'Usuarios', 'oscuro'));
    }
})->name('login');





Route::get('usuarios', function () {
    $Titulo = "Usuarios";
    $Usuarios = true;
    if (session()->get('logueado') == true) {
        return redirect('/');
    } else {   
        return view('no-logueado/pages/usuarios', compact('Titulo', 'Usuarios'));
    }
})->name('usuarios');

Route::get('publicaciones', function () {
    $Titulo = "Publicaciones";
    $Publicaciones = true;
    if (session()->get('logueado') == true) {
        return redirect('/');
    } else {   
        return view('no-logueado/pages/publicaciones', compact('Titulo', 'Publicaciones'));
    }
})->name('publicaciones');

Route::get('categorias', function () {
    $Titulo = "Categorias";
    $Categorias = true;
    if (session()->get('logueado') == true) {
        return redirect('/');
    } else {   
        return view('no-logueado/pages/categorias', compact('Titulo', 'Categorias'));
    }
})->name('categorias');

Route::get('materias', function () {
    $Titulo = "Materias";
    $Materias = true;
    if (session()->get('logueado') == true) {
        return redirect('/');
    } else {   
        return view('no-logueado/pages/materias', compact('Titulo', 'Materias'));
    }
})->name('materias');