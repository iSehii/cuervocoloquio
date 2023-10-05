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
        

        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id();
            $table->string('Titulo');
            $table->text('Contenido');
            $table->string('ContenidoText');
            $table->boolean('Activo');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_carrera');
            $table->integer('id_cuatrimestre');
            $table->string('tags');
            $table->boolean('Publica');
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('usuario')->ondelete('cascade');
            $table->foreign('id_carrera')->references('id')->on('carrera')->ondelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicaciones');
    }
};
