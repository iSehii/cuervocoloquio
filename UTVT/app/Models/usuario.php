<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';

    protected $fillable = [
        'Correo',
        'pass',
        'Matricula',
        'foto',
        'Portada',
        'Nombre',
        'Apellido_paterno',
        'Apellido_materno',
        'Genero',
        'Fecha_nacimiento',
        'Telefono',
        'Activo',
        'id_rol',
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }
}