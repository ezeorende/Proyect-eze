<?php
namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Medalla;
use Illuminate\Http\Request;
use App\Models\Pais;

class EquipoController extends Controller
{
    
    public function index()
    {
        return response()->json(Equipo::all());
    }


    public function store(Request $request)
    {
        // Validar los datos de entrada
        /*
        $validated = $request->validate([
            'pais_id' => 'required|integer|exists:pais,id|min:0',
            'evento_deportivo_id' => 'required|exists:evento_deportivos,id|integer|min:0',
            'tipo_medalla' => 'required|integer|min:0|in:oro,plata,bronce',
            'deportistas' => 'required|array',
            'deportistas.*' => 'required|integer|exists:deportistas,id',
        ]);
        */

        $validated = $request->toArray(); 
        
        
        //Crea una medalla nueva para el equipo que la gano, basandose en el tipo de la medalla (oro - plata - bronce)
        $medalla = Medalla::crearMedalla($validated['evento_deportivo_id'], $validated['tipo_medalla']);
       

        //Actualiza en la tabla Pais las medallas que este tiene, dependiendo el tipo de la mdedalla 
        $pais = Pais::find($validated['pais_id']);
        if ($validated['tipo_medalla'] === 'oro') {
            $pais->medallas_oro += 1;
        } elseif ($validated['tipo_medalla'] === 'plata') {
            $pais->medallas_plata += 1;
        } elseif ($validated['tipo_medalla'] === 'bronce') {
            $pais->medallas_bronce += 1;
        }
        $pais->save();

        //Actualiza el total de las medallas con las cuales cuenta el Pais
        Pais::actualizarTotalMedallas($validated['pais_id']);


        // Crear el registro en la base de datos
        $equipo = Equipo::create([
            'pais' => $validated['pais_id'],
            'evento_deportivo' => $validated['evento_deportivo_id'],
            'medalla' => $medalla->id,
        ]);

        $equipo->deportistas()->sync($validated['deportistas']);

        // Retornar una respuesta JSON
        return response()->json([
            'message' => 'Registro creado exitosamente',
            'data' => $equipo
        ], 201);
    }

    
  


    public function show(Request $request, string $id) {
        $equipo = Equipo::findOrFail($id);
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
        $equipo = Equipo::find($id);

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
        $equipo = Equipo::findOrFail($id);

        //Retora una respouesta Json y borra el pais
        return response()->json($equipo->delete());
    }
}
