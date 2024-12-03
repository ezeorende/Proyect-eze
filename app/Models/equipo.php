<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipo extends Model
{
    use HasFactory;

    // Define el nombre de la tabla si es necesario 
    protected $table = 'equipos';

    protected $fillable = [
        'pais',
        'evento_deportivo',
        'medalla',
    ];
}
