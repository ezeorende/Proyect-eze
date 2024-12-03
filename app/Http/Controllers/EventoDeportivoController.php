<?php
namespace App\Http\Controllers;

use App\Models\Evento_deportivo;
use Illuminate\Http\Request;

class EventoDeportivoController extends Controller
{
  
    public function index()
    {
        return response()->json(Evento_deportivo::all());
    }

   
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validated = $request->validate([ 
        'id_deporte'=>'required|integer|min:0',
        'nombre'=>'required|string|max:255',
        ]);

        // Crear el registro en la base de datos
        $evento_deportivos = Evento_deportivo::create($validated);

        // Retornar una respuesta JSON
        return response()->json([
            'message' => 'Evento deportivo creado exitosamente',
            'data' => $evento_deportivos
        ], 201);
    }

    
    public function show(Request $request, string $id) {
        $evento_deportivos = Evento_deportivo::findOrFail($id);
        return response()->json($evento_deportivos);
    }


    
    

    
    public function update(Request $request, $id)
    {
        // Valida los datos de entrada que recibe
        $validated = $request->validate([
            'id_deporte'=>'required|integer|min:0',
            'nombre'=>'required|string|max:255',
        ]);

    // Buscar la medalla por su ID
        $evento_deportivos = Evento_deportivo::find($id);

        if (!$evento_deportivos) {
            return response()->json([
                'message' => 'Evento deportivo no encontrado.'
            ], 404);
        }
        
    // Actualizar solo los campos enviados en la solicitud
    $evento_deportivos->update($validated);

    // Retornar la respuesta con la medalla actualizada
    return response()->json([
        'message' => 'Evento deportivo actualizado exitosamente.',
        'data'    => $evento_deportivos
    ], 200);
}

    
    public function destroy(string $id)
    {
        $evento_deportivos = Evento_deportivo::findOrFail($id);
        return response()->json($evento_deportivos->delete());
    }
}
