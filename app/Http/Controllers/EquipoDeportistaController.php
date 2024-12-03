<?php
namespace App\Http\Controllers;

use App\Models\equipo_deportista;
use Illuminate\Http\Request;

class EquipoDeportistaController extends Controller
{
    
    public function index()
    {
        return response()->json(equipo_deportista::all());
    }


    
    public function store(Request $request)
    {
        //
    }

    
    public function show(string $id)
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
