<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class periodo extends Model
{
    use HasFactory;
    protected $table = 'periodo';

    protected $fillable = [
        'Comienzo',
        'Fin',
        'Tipo',
    ];
}
