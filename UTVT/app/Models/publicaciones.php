<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publicaciones extends Model
{
    use HasFactory;
    protected $table = 'publicaciones';

    protected $fillable = [
        'Titulo',
        'Contenido',
        'ContenidoText',
        'Activo',
        'id_usuario',
        'id_carrera',
        'id_cuatrimestre',
        'tags',
        'Publica',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }
}
