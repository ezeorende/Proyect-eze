<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medallas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->references('id')->on('evento_deportivos');
            $table->enum('tipo', ['oro', 'plata', 'bronce']);
            $table->timestamps();

            // Restricción única para evitar la entrada duplicada de medallas por eventos deportivos.
            $table->unique(['evento_id', 'tipo'], 'evento_medalla_unique');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medallas');
    }
};
