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




