<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carrera extends Model
{
    use HasFactory;

    protected $table = 'carrera';

    protected $fillable = [
        'Clave',
        'Nombre',
    ];
}
