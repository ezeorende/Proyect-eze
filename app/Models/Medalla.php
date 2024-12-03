<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Medalla extends Model
{
    use HasFactory;

    // Define el nombre de la tabla si es necesario 
    protected $table = 'medallas';

     //Define que campos de la tabla pueden ser editados 
    protected $fillable = [
        'evento_id',
        'tipo',
    ];

}





/*


class Medalla extends Model
{
    use HasFactory;
    protected $tabe = 'medallas';

    protected $fiable = [
        'tipo'

    ];
}

*/