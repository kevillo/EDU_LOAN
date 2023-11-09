<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

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

    
}
