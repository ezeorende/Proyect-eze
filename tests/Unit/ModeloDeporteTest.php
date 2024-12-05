<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Deporte;

class ModeloDeporteTest extends TestCase
{
    public function test_devolver_nombre(){
       
        $deporte = new Deporte([
            'nombre' => 'futbol'
        ]);
        $this->assertEquals('futbol', $deporte-> obtenerPorNombre($nombre));

    }
}
