<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materia_grupo extends Model
{
    use HasFactory;
    protected $table = 'materia_grupo';

    protected $fillable = [
        'id_materia',
        'id_grupo',
        'Activo',
        'Fecha_inicio',
        'Fecha_termino',
    ];

    public function materia()
    {
        return $this->belongsTo(materia::class, 'id_materia');
    }

    public function grupo()
    {
        return $this->belongsTo(grupo::class, 'id_grupo');
    }
}
