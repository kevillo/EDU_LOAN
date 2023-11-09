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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->bigIncrements('id');
            //relaciones
            $table->unsignedBigInteger('id_equipo');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_estudiante');


            $table->foreign('id_equipo')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_estudiante')->references('id')->on('estudiantes')->onDelete('cascade');
            $table->date('fecha_solictud');
            $table->date('fecha_prestamo');
            $table->date('fecha_devolucion_estimada');
            $table->date('fecha_devolucion_real');
            $table->string('estado_prestamo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
