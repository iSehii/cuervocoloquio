<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario_grupo extends Model
{
    use HasFactory;
    protected $table = 'usuario_grupo';

    protected $fillable = [
        'id_usuario',
        'id_grupo',
        'Activo',
        'Fecha_inicio',
        'Fecha_termino',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }
}
