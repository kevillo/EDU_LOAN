<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_tipo_equipo');
            $table->string('numero_serie');
            $table->foreign('id_tipo_equipo')->references('id')->on('tipo_equipos')->onDelete('cascade');
            $table->string('nombre_equipo');
            $table->string('marca_equipo');
            $table->string('modelo_equipo');
            $table->string('color_equipo');
            $table->string('estado_equipo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
