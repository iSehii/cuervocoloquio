<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario_materia extends Model
{
    protected $table = 'usuario_materia';

    protected $fillable = [
        'id_usuario',
        'id_materia',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'id_materia');
    }
}
