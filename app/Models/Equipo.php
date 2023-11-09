<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    // relacion con la tabla tipo_equipos

    public function tipo_equipo()
    {
        return $this->belongsTo(TipoEquipo::class);
    }
    
}
