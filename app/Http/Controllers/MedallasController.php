<?php
namespace App\Http\Controllers;
use App\Models\Medalla;


class MedallasController extends Controller
{
    public function index()
    {
        return response()->json(Medalla::all());
    }


    public function store(Request $request)
    {
    // Validar los datos recibidos

    /*
        Este es el ultimo mensaje de controladores definido. Actualmente es infuncional debido a que necesita
        el evento deportivo exista para poder funcionar. Es necesario terminar con todos los mensajes de 
        controladores para que la funcionalidad de todos este disponible. En esta ultima version solo se definio
        los de la tabla pais.
    */
    $validated = $request->validate([
        'evento_id' => 'required|integer|exists:eventos,id', // Verifica que el evento exista
        'tipo' => 'required|in:oro,plata,bronce', // Asegura que el tipo sea uno de los valores permitidos
    ]);

    // Crear el registro en la base de datos
    $medalla = Medalla::create([
        'evento_id' => $validated['evento_id'],
        'tipo' => $validated['tipo'],
    ]);

    // Retornar una respuesta JSON
    return response()->json([
        'message' => 'Medalla creada exitosamente',
        'data' => $medalla
    ], 201);
    }

}


