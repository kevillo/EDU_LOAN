<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estudiante extends Model
{
    use HasFactory;
    use SoftDeletes;

    // relacion con la tabla cursos

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    // relacion con la tabla usuarios

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'nombre_estudiante',
        'apellido_estudiante',
        'correo_estudiante',
        'fecha_nacimiento_estudiante',
        'imagen_estudiante',
        'id_curso',
        'id_usuario'
    ];
}
