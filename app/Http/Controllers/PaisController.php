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


    public function update(Request $request, string $id) {
        $validated = $request->validate([
            'nombre' => 'string|max:255',
            'medallas_oro' => 'integer|min:0',
            'medallas_plata' => 'integer|min:0',
            'medallas_bronce' => 'integer|min:0',
        ]);

        $pais = Pais::findOrFail($id);

        $total_medallas = $validated['medallas_oro']
            + $validated['medallas_plata']
            + $validated['medallas_bronce'];

        $validated['total_medallas'] = $total_medallas;

        $pais->update($validated);

        return response()->json($pais->fresh());
    }


    public function destroy(string $id) {
        $pais = Pais::findOrFail($id);
        return response()->json($pais->delete());
    }
}