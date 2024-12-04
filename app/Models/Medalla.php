<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medalla extends Model
{
    use HasFactory;
    protected $table ='medallas';
    protected $fillable = ['evento_id', 'tipo'];

        // Relación con el modelo EventoDeportivo
    public function eventoDeportivo()
    {
        return $this->belongsTo(EventoDeportivo::class, 'evento_id');
    }

     //Define que campos de la tabla pueden ser editados 



    /**
     * Obtener una medalla por su ID
     */
    public static function obtenerPorId($id)
    {
        return self::find($id);
    }

    /**
     * Crear una nueva medalla
     */
    public static function crearMedalla($id_evento, $tipo)
    {
        return self::create([
            'evento_id' => $id_evento,
            'tipo' => $tipo,
        ]);
    }

    /**
     * Actualizar los datos de una medalla
     */
    public static function actualizarMedalla($id, $id_evento, $tipo)
    {
        $medalla = self::find($id);
        if ($medalla) {
            $medalla->id_evento = $id_evento;
            $medalla->tipo = $tipo;
            $medalla->save();
            return $medalla;
        }
        return null;
    }

    /**
     * Eliminar una medalla
     */
    public static function eliminarMedalla($id)
    {
        $medalla = self::find($id);
        if ($medalla) {
            $medalla->delete();
            return true;
        }
        return false;
    }



    /*A partir de este punto empiezo a definir funciones utiles para las transacciones de controladores */
    
    
    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }
}
