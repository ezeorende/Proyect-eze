<?php
namespace App\Http\Controllers;

use App\Models\Deportista;
use Illuminate\Http\Request;

class DeportistaController extends Controller
{
   
    public function index()
    {
        return response()->json(Deportista::all());
    }


    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validated = $request->validate([
            'nombre' => 'required|string|max:255', 
            'pais' => 'required|integer|min:0',
        ]);

        // Crear el registro en la base de datos
        $deportistas = Deportista::create($validated);

        // Retornar una respuesta JSON
        return response()->json([
            'message' => 'Deportista creado exitosamente',
            'data' => $deportistas
        ], 201); 
    }


    public function show(string $id)
    {
        $deportistas = Deportista::findOrFail($id);
        return response()->json($deportistas);
    }

    
    public function update(Request $request, string $id)
    {
        // Valida los datos de entrada que recibe
        $validated = $request->validate([
            'nombre' => 'string|max:255',
            'pais' => 'integer|min:0'
        ]);

        // Buscar la tabla por su ID
        $deportistas = Deportista::find($id);

        if (!$deportistas) {
            return response()->json([
                'message' => 'Deportista no encontrado.'
            ], 404);
        }
            
        // Actualizar solo los campos enviados en la solicitud
        $deportistas->update($validated);

        // Retornar la respuesta el pais actualizado
        return response()->json([
            'message' => 'Deportista actualizado exitosamente.',
            'data'    => $deportistas
        ], 200);
    }


    public function destroy(string $id)
    {
        //Busca el pais por su id
        $deportistas = Deportista::findOrFail($id);

        //Retora una respouesta Json y borra el pais
        return response()->json($deportistas->delete());
    }
}
