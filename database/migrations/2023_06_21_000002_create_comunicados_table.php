<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunicadosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('comunicados', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); // Agregamos la columna 'titulo'
            $table->text('contenido'); // Agregamos la columna 'contenido'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('comunicados');
    }
}
