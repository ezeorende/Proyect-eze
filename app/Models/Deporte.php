<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{
    use HasFactory;
    // Define el nombre de la tabla si es necesario 
    protected $table = 'deportes';
    protected $fillable = ['nombre'];

    /**
     * Obtener todos los deportes
     */
    public static function obtenerTodos()
    {
        return self::all();
    }

    /**
     * Obtener un deporte por su nombre
     */
    public static function obtenerPorId($nombre)
    {
        return self::find($nombre);
    }

    /**
     * Crear un nuevo deporte
     */
    public static function crearDeporte($nombre)
    {
        return self::create([
            'nombre' => $nombre,
        ]);
    }

    /**
     * Actualizar un deporte
     */
    public static function actualizarDeporte($id, $nombre)
    {
        $deporte = self::find($id);
        if ($deporte) {
            $deporte->nombre = $nombre;
            $deporte->save();
            return $deporte;
        }
        return null;
    }

    /**
     * Eliminar un deporte
     */
    public static function eliminarDeporte($id)
    {
        $deporte = self::find($id);
        if ($deporte) {
            $deporte->delete();
            return true;
        }
        return false;
    }

}
