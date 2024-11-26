<?php
namespace App\Http\Controllers;
use App\Models\Evento_deportivo;

class EventoDeportivoController extends Controller
{
  
    public function index()
    {
        return response()->json(Evento_deportivo::all());
    }

   
  /*
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_deporte'=>'required|integer|exists:deportes,id',
            'nombre'=>'required|string|max:255'

        ]);

        // Crear el registro en la base de datos
        $evento_deportivo = Evento_deportivo::create($validated);

        // Retornar una respuesta JSON
        return response()->json([
            'message' => 'País creado exitosamente',
            'data' => $evento_deportivo
        ], 201);
        
    }
*/
    
public function show(Request $request, string $id) {
    $evento_deportivo = Evento_deportivo::findOrFail($id);
    return response()->json($evento_deportivo);
}


    
    

    
    public function update(Request $request, string $id)
    {
       
    }

    
    public function destroy(string $id)
    {
        
    }
}
