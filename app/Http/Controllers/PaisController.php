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

    
    public function create()
    {
        //
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
    
        // Crear el registro en la base de datos
        $pais = Pais::create([
            'nombre' => $validated['nombre'],
            'medallas_oro' => $validated['medallas_oro'],
            'medallas_plata' => $validated['medallas_plata'],
            'medallas_bronce' => $validated['medallas_bronce'],
            'total_medallas' => $total_medallas,
        ]);
    
        // Retornar una respuesta JSON
        return response()->json([
            'message' => 'País creado exitosamente',
            'data' => $pais
        ], 201);
    }




    /*
    public function store(Request $request)
{
    $pais = new Pais();
    $pais->nombre = $request->nombre;
    $pais->medallas_oro = $request->medallas_oro;
    $pais->medallas_plata = $request->medallas_plata;
    $pais->medallas_bronce = $request->medallas_bronce;
    $pais->total_medallas = $request->total_medallas;
    
    $pais->save();
    return response()->json([$pais]);
}

*/
    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        //
    }
}
