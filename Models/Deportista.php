<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deportista extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======
<<<<<<< HEAD
    // Define el nombre de la tabla si es necesario 
    protected $table = 'deportistas'; 

    protected $fillable = [
        'nombre',
        'pais',
        
    ];
=======
>>>>>>> fccdec53222ba78b5ca5d28a0dd02285a44920d6
    protected $table ='deportistas';
    protected $fillable = ['nombre', 'pais'];

    public static function obtenerTodos()
    {
        return self::all();
    }

    /**
     * Obtener un deportista por su nombre
     */
    public static function obtenerPorId($nombre)
    {
        return self::find($nombre);
    }

    /**
     * Crear un nuevo deportista
     */
    public static function crearDeportista($nombre, $pais)
    {
        return self::create([
            'nombre' => $nombre,
            'pais' => $pais,
        ]);
    }

    /**
     * Actualizar los datos de un deportista
     */
    public static function actualizarDeportista($id, $nombre, $pais)
    {
        $deportista = self::find($id);
        if ($deportista) {
            $deportista->nombre = $nombre;
            $deportista->pais = $pais;
            $deportista->save();
            return $deportista;
        }
        return null;
    }

    /**
     * Eliminar un deportista
     */
    public static function eliminarDeportista($id)
    {
        $deportista = self::find($id);
        if ($deportista) {
            $deportista->delete();
            return true;
        }
        return false;
    }
<<<<<<< HEAD
=======
>>>>>>> a898530e1214a575a74e276c26d474bcb9128567
>>>>>>> fccdec53222ba78b5ca5d28a0dd02285a44920d6
}
