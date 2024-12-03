<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{
    use HasFactory;
    // Define el nombre de la tabla si es necesario 
    protected $table = 'deportes';

    protected $fillable = [
        'nombre',
    ];
}
