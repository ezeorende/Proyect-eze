<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table ='equipos';
    protected $fillable = ['pais', 'evento_deportivo', 'medalla'];

      /** Relación con el modelo EventoDeportivo (Este método indica que el modelo actual
     * tiene una clave foránea que apunta a otro modelo,se utiliza para
     * establecer que el equipo está asociado a un evento deportivo y a una medalla específicos.)
     */

     public function deportistas() 
     {
        return $this->belongsToMany(Deportista::class, 'equipo_deportistas', 'id_equipo', 'id_deportista');
    }

     public function eventoDeportivo()
     {
         return $this->belongsTo(EventoDeportivo::class, 'evento_deportivo');
     }
 
     // Relación con el modelo Medalla
     public function medalla()
     {
         return $this->belongsTo(Medalla::class, 'medalla');
     }

       /**
     * Obtener todos los equipos
     */
    public static function obtenerTodos()
    {
        return self::all();
    }

    /**
     * Obtener un equipo por su ID
     */
    public static function obtenerPorId($id)
    {
        return self::find($id);
    }

    /**
     * Crear un nuevo equipo
     */
    public static function crearEquipo($pais, $evento_deportivo_id, $medalla_id)
    {
        return self::create([
            'pais' => $pais,
            'evento_deportivo' => $evento_deportivo_id,
            'medalla' => $medalla_id,
        ]);
    }

    /**
     * Actualizar los datos de un equipo
     */
    public static function actualizarEquipo($id, $pais, $evento_deportivo_id, $medalla_id)
    {
        $equipo = self::find($id);
        if ($equipo) {
            $equipo->pais = $pais;
            $equipo->evento_deportivo_id = $evento_deportivo_id;
            $equipo->medalla_id = $medalla_id;
            $equipo->save();
            return $equipo;
        }
        return null;
    }

    /**
     * Eliminar un equipo
     */
    public static function eliminarEquipo($id)
    {
        $equipo = self::find($id);
        if ($equipo) {
            $equipo->delete();
            return true;
        }
        return false;
    }
}