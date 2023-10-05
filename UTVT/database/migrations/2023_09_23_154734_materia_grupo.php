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
        
        Schema::create('materia_grupo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_materia');
            $table->unsignedBigInteger('id_grupo');
            $table->boolean('Activo');
            $table->date('Fecha_inicio');
            $table->date('Fecha_termino');
            $table->timestamps();
            $table->foreign('id_materia')->references('id')->on('materia')->ondelete('cascade');
            $table->foreign('id_grupo')->references('id')->on('grupo')->ondelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materia_grupo');
    }
};
