<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    use HasFactory;
    use SoftDeletes;

    // relacion con la tabla tipo_equipos

    public function tipo_equipo()
    {
        return $this->belongsTo(TipoEquipo::class);
    }

    protected $fillable = [
        'id_tipo_equipo',
        'numero_serie',
        'nombre_equipo',
        'marca_equipo',
        'imagen_equipo',
        'modelo_equipo',
        'color_equipo',
        'estado_equipo',
    ];
}
