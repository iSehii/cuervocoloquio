<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\usuario;
use App\Models\carrera;

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
        return $this->belongsTo(usuario::class, 'id_usuario');
    }

    public function carrera()
    {
        return $this->belongsTo(carrera::class, 'id_carrera');
    }
}
