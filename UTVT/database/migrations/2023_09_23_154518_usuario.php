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
    Schema::create('usuario', function (Blueprint $table) {
        $table->id();
        $table->boolean('Publico');
        $table->string('Correo');
        $table->text('pass');
        $table->string('Matricula');
        $table->text('foto');
        $table->text('Portada');
        $table->string('Nombre');
        $table->string('Apellido_paterno');
        $table->string('Apellido_materno');
        $table->string('Genero');
        $table->date('Fecha_nacimiento');
        $table->string('Telefono');
        $table->boolean('Activo');
        $table->unsignedBigInteger('id_rol');
        $table->foreign('id_rol')->references('id')->on('rol')->ondelete('cascade');
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
        Schema::dropIfExists('usuario');
    }
};
