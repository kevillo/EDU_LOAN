<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // relacion con la tabla estudiantes

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }
}
