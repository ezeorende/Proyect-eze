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
<<<<<<< HEAD
            $table->foreignId('id_evento')->references('id')->on('evento_deportivos');
=======
            $table->foreignId('evento_id')->references('id')->on('evento_deportivos');
>>>>>>> fccdec53222ba78b5ca5d28a0dd02285a44920d6
            $table->enum('tipo', ['oro', 'plata', 'bronce']);
            $table->timestamps();

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
