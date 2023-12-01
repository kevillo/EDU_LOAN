<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_curso');
            $table->unsignedBigInteger('id_usuario');
            $table->string('nombre_estudiante');
            $table->string('apellido_estudiante');
            $table->string('correo_estudiante');
            $table->string('imagen_estudiante');
            $table->date('fecha_nacimiento_estudiante');
            //relaciones
            $table->foreign('id_curso')->references('id')->on('cursos')->ondelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('users')->ondelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
