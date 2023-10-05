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

        Schema::create('publicaciones_respuestas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_publicacion');
            $table->unsignedBigInteger('id_usuario');
            $table->text('Respuesta');
            $table->timestamps();
            $table->foreign('id_publicacion')->references('id')->on('publicaciones')->ondelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('usuario')->ondelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicaciones_respuestas');
    }
};
