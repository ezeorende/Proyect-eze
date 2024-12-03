<?php
namespace App\Http\Controllers;

use App\Models\Medalla;
use Illuminate\Http\Request;


class MedallasController extends Controller
{
    public function index()
    {
        return response()->json(Medalla::all());
    }


    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validated = $request->validate([
            'evento_id'=> 'required|integer|min:0',
            'tipo'=> 'required|string|max:255',
        ]);

        // Crear el registro en la base de datos
        $medalla = Medalla::create($validated);

        // Retornar una respuesta JSON
        return response()->json([
            'message' => 'Medalla creada exitosamente',
            'data' => $medalla
        ], 201);
    }


    public function update(Request $request, $id)
        {
            // Valida los datos de entrada que recibe
            $validated = $request->validate([
                'evento_id' => 'sometimes|required|integer',
                'tipo'      => 'sometimes|required|in:oro,plata,bronce',
            ]);

        // Buscar la medalla por su ID
            $medalla = Medalla::find($id);

            if (!$medalla) {
                return response()->json([
                    'message' => 'Medalla no encontrada.'
                ], 404);
            }
            
        // Actualizar solo los campos enviados en la solicitud
        $medalla->update($validated);

        // Retornar la respuesta con la medalla actualizada
        return response()->json([
            'message' => 'Medalla actualizada exitosamente.',
            'data'    => $medalla
        ], 200);
    }



    public function show(Request $request, string $id) 
    {
        $medalla = Medalla::findOrFail($id);
        return response()->json($medalla);
    }


    public function destroy(string $id) {
        $medalla = Medalla::findOrFail($id);
        return response()->json($medalla->delete());
    }
}




