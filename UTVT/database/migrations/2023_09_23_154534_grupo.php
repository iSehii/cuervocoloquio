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
        Schema::create('grupo', function (Blueprint $table) {
            $table->id();
            $table->string('Clave');
            $table->string('Nombre');
            $table->string('Cuatrimestre');
            $table->unsignedBigInteger('id_periodo');
            $table->unsignedBigInteger('id_carrera');
            $table->timestamps();
            $table->foreign('id_carrera')->references('id')->on('carrera')->ondelete('cascade');
            $table->foreign('id_periodo')->references('id')->on('periodo')->ondelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo');
    }
};
