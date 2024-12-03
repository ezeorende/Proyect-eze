<?php
namespace App\Http\Controllers;

use App\Models\Deporte;
use Illuminate\Http\Request;

class DeporteController extends Controller
{
    
    public function index()
    {
        return response()->json(Deporte::all());
    }

    
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
 
        // Crear el registro en la base de datos
        $deportes = Deporte::create($validated);

        // Retornar una respuesta JSON
        return response()->json([
            'message' => 'Deporte creado exitosamente',
            'data' => $deportes
        ], 201);
    }

    
    public function show(string $id)
    {
        $deportes = Deporte::findOrFail($id);
        return response()->json($deportes);
    }

    
    
    public function update(Request $request, $id)
    {
        // Valida los datos de entrada que recibe
        $validated = $request->validate([
            'nombre' => 'string|max:255',
        ]);

        // Buscar la tabla por su ID
        $deportes = Deporte::find($id);

        if (!$deportes) {
            return response()->json([
                'message' => 'Deporte no encontrado.'
            ], 404);
        }
            
        // Actualizar solo los campos enviados en la solicitud
        $deportes->update($validated);

        // Retornar la respuesta el pais actualizado
        return response()->json([
            'message' => 'Deporte actualizado exitosamente.',
            'data'    => $deportes
        ], 200);
    }

    
    public function destroy(string $id)
    {
        //Busca el pais por su id
        $deportes = Deporte::findOrFail($id);

        //Retora una respouesta Json y borra el pais
        return response()->json($deportes->delete());
    }
}
