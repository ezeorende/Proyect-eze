<?php
namespace App\Http\Controllers;

use App\Models\equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    
    public function index()
    {
        return response()->json(equipo::all());
    }


    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validated = $request->validate([
            'pais' => 'required|integer|min:0',
            'evento_deportivo' => 'required|integer|min:0',
            'medalla' => 'required|integer|min:0',
        ]);

        // Crear el registro en la base de datos
        $equipo = equipo::create($validated);

        // Retornar una respuesta JSON
        return response()->json([
            'message' => 'Registro creado exitosamente',
            'data' => $equipo
        ], 201);
    }

   
    public function show(Request $request, string $id) {
        $equipo = equipo::findOrFail($id);
        return response()->json($equipo);
    }


    public function update(Request $request, $id)
    {
        // Valida los datos de entrada que recibe
        $validated = $request->validate([
            'pais' => 'integer|min:0',
            'evento_deportivo' => 'integer|min:0',
            'medalla' => 'integer|min:0',
        ]);

        // Buscar la tabla por su ID
        $equipo = equipo::find($id);

        //Envia un mensaje de error si el equipo solicitado no existe
        if (!$equipo) {
            return response()->json([
                'message' => 'Equipo no encontrado.'
            ], 404);
        }
            
        // Actualizar solo los campos enviados en la solicitud
        $equipo->update($validated);

        // Retornar la respuesta el pais actualizado
        return response()->json([
            'message' => 'equipo actualizado exitosamente.',
            'data'    => $equipo
        ], 200);
    }

    
    public function destroy(string $id)
    {
        //Busca el pais por su id
        $equipo = equipo::findOrFail($id);

        //Retora una respouesta Json y borra el pais
        return response()->json($equipo->delete());
    }
}
