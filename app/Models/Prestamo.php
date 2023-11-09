<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    // relacion con la tabla usuarios

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    // relacion con la tabla equipos

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    // relacion con la tabla estudiantes

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    // relacion con log

    public function log()
    {
        return $this->hasMany(Log::class);
    }
}
