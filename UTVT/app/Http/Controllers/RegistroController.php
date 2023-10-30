<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\carrera;
use App\Models\Grupo;
use App\Mail\Registro;
use App\Models\Usuario;
use App\Models\usuario_grupo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistroController extends Controller
{
public function Enviar()
    {
    $correo = new Registro();
    
    Mail::to('gsch.sehi@gmail.com')->send($correo);
    
    return response()->json(['message' => 'Correo enviado correctamente']);
    }

    public function RegistrarAlumno(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'Apellido_paterno' => 'required',
            'Apellido_materno' => 'required',
            'matricula' => 'required|regex:/^\d+$/|unique:usuario,Matricula',
            'correo' => 'required|regex:/^(al|alu)\d{9,11}@gmail\.com$|^([A-Za-z0-9._]+)@utvtol\.edu\.mx$/i|unique:usuario,Correo',
            'telefono' => 'required|regex:/^\d+$/',
            'pass2' => 'required',
            'genero' => 'required',
            'Fecha_nacimiento' => 'required|date',
            'grupoF' => 'required|numeric|between:1,2115',
        ]);
 

        $matricula = $request->input('matricula');
        $correo = $request->input('correo');
        $grupo = $request->input('grupoF');

        $usuario = new Usuario();
        $usuario->Correo = $correo;
        $usuario->pass = Hash::make($request->input('pass2'));
        $usuario->Matricula = $matricula;
        $usuario->foto = 'user.png';
        $usuario->Portada = 'Fondo.jpg';
        $usuario->Nombre = $request->input('nombre');
        $usuario->Apellido_paterno = $request->input('Apellido_paterno');
        $usuario->Apellido_materno = $request->input('Apellido_materno');
        $usuario->Genero = $request->input('genero');
        $usuario->Fecha_nacimiento = $request->input('Fecha_nacimiento');
        $usuario->Telefono = $request->input('telefono');
        $usuario->Activo = 1;
        $usuario->id_rol = 3;

        $usuario->save();

        $usuarioGrupo = new usuario_grupo();
        $usuarioGrupo->id_usuario = $usuario->id;
        $usuarioGrupo->id_grupo = $grupo;
        $usuarioGrupo->Activo = 1;
        $usuarioGrupo->Fecha_inicio = "23/05/02";
        $usuarioGrupo->Fecha_termino = "23/08/31";
        $usuarioGrupo->save();

        session(['Logueado' => true, 'id_rol' => 3, 'registrado' => true, 'id_usuario' => $usuario->id]);
        $Titulo = "¡Regístro exitoso!";
        $Usuarios = true;
        return view('no-logueado.pages.auth.register.success', compact('Titulo', 'Usuarios'));
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
    }}