<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupo extends Model
{
    use HasFactory;
    protected $table = 'grupo';

    protected $fillable = [
        'Clave',
        'Nombre',
        'Cuatrimestre',
        'id_periodo',
        'id_carrera',
    ];

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'id_periodo');
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }
}
