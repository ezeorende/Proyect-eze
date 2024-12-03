<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento_deportivo extends Model
{
    use HasFactory;
    
    // Define el nombre de la tabla si es necesario 
    protected $table = 'evento_deportivos';
}
