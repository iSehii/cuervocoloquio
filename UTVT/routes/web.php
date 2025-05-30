<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Temas;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CarrerasController;
use App\Http\Controllers\LoginController;
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
Route::get('/correos', [RegistroController::class, 'Enviar']);

Route::get('/', function () {
    $Inicio = 'Selected';
    if (session()->get('logueado') == true) {
        $Titulo = 'Inicio';
        return view('logueado', compact('Titulo', 'Inicio'));
    } else {
        $Titulo = 'Inicia sesión o regìstrate';
        return view('no-logueado/inicio', compact('Titulo', 'Inicio'));
    }
})->name('inicio');

Route::prefix('carreras')->group(function () {
    Route::get('/', function () {
        $Titulo = 'Carreras';
        $Carreras = true;
        if (session()->get('logueado') == true) {
            return redirect('/');
        } else {
            return view('no-logueado/pages/carreras/carreras', compact('Titulo', 'Carreras'));
        }
    })->name('carreras');

    Route::get('/{carrera}', [CarrerasController::class, 'Carreras'])->name('carrera');
});

Route::prefix('registro')->group(function () {
    Route::get('/', function () {
        $Titulo = 'Regìstrate';
        $Usuarios = true;
        if (session()->get('logueado') == true) {
            return redirect('/');
        } else {
            return view('no-logueado/pages/auth/register/inicio', compact('Titulo', 'Usuarios'));
        }
    })->name('registro');

    Route::get('alumno', [RegistroController::class, 'Registro'])->name('registroAlumno');
    Route::post('/alumno/success', [RegistroController::class, 'RegistrarAlumno'])->name('registrarAlumno');
    Route::get('/alumno/success', function () {
        return redirect()->route('registroAlumno');
    });
});

Route::get('login', [LoginController::class, 'Login'])->name('login');

Route::get('usuarios', function () {
    $Titulo = 'Usuarios';
    $Usuarios = true;
    if (session()->get('logueado') == true) {
        return redirect('/');
    } else {
        return view('no-logueado/pages/usuarios', compact('Titulo', 'Usuarios'));
    }
})->name('usuarios');

Route::get('publicaciones', function () {
    $Titulo = 'Publicaciones';
    $Publicaciones = true;
    if (session()->get('logueado') == true) {
        return redirect('/');
    } else {
        return view('no-logueado/pages/publicaciones', compact('Titulo', 'Publicaciones'));
    }
})->name('publicaciones');


Route::prefix('categorias')->group(function () {
    Route::get('/', [CategoriasController::class, 'Filtros'])->name('categorias');

});



Route::get('materias', function () {
    $Titulo = 'Materias';
    $Materias = true;
    if (session()->get('logueado') == true) {
        return redirect('/');
    } else {
        return view('no-logueado/pages/materias', compact('Titulo', 'Materias'));
    }
})->name('materias');