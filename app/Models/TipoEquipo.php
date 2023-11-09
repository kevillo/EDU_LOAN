<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
    use HasFactory;

    // relacion con la tabla equipos

    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
}
