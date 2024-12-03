<?php
namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{

    public function index()
    {
        return response()->json(Pais::all());
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'medallas_oro' => 'required|integer|min:0',
            'medallas_plata' => 'required|integer|min:0',
            'medallas_bronce' => 'required|integer|min:0',
        ]);

        // Calcular el total de medallas
        $total_medallas = $validated['medallas_oro']
                        + $validated['medallas_plata']
                        + $validated['medallas_bronce'];

        $validated['total_medallas'] = $total_medallas;

        // Crear el registro en la base de datos
        $pais = Pais::create($validated);

        // Retornar una respuesta JSON
        return response()->json([
            'message' => 'País creado exitosamente',
            'data' => $pais
        ], 201);
    }

    public function show(Request $request, string $id) {
        $pais = Pais::findOrFail($id);
        return response()->json($pais);
    }


    public function update(Request $request, $id)
    {
        // Valida los datos de entrada que recibe
        $validated = $request->validate([
            'nombre' => 'string|max:255',
            'medallas_oro' => 'integer|min:0',
            'medallas_plata' => 'integer|min:0',
            'medallas_bronce' => 'integer|min:0',
        ]);

        //Realiza la suimatoria de las medallas totales con las cuales cuenta el pais
        $total_medallas = $validated['medallas_oro']
            + $validated['medallas_plata']
            + $validated['medallas_bronce'];

        //Actualiza el total de las medallas
        $validated['total_medallas'] = $total_medallas;

        // Buscar el pais por su ID
        $pais = Pais::find($id);

        //Envia un mensaje de error si el equipo solicitado no existe
        if (!$pais) {
            return response()->json([
                'message' => 'Pais no encontrado.'
            ], 404);
        }
            
        // Actualizar solo los campos enviados en la solicitud
        $pais->update($validated);

        // Retornar la respuesta el pais actualizado
        return response()->json([
            'message' => 'Pais actualizado exitosamente.',
            'data'    => $pais
        ], 200);
    }



    

    public function destroy(string $id) {
        //Busca el pais por su id
        $pais = Pais::findOrFail($id);

        //Retora una respouesta Json y borra el pais
        return response()->json($pais->delete());
    }
}