<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publicaciones_respuestas extends Model
{
    use HasFactory;

    protected $table = 'publicaciones_respuestas';

    protected $fillable = [
        'id_publicacion',
        'id_usuario',
        'Respuesta',
    ];

    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class, 'id_publicacion');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
