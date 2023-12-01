<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use HasFactory;
    use SoftDeletes;

    // relacion con la tabla estudiantes
    // cambiar tabla
    protected $table = 'cursos';

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }


    protected $fillable = [
        'nombre_curso',
    ];
}
