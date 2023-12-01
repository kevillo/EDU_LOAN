<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoEquipo extends Model
{
    use HasFactory;
    use SoftDeletes;

    // relacion con la tabla equipos

    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }

    protected $fillable = [
        'descripcion_tipo_equipo',
    ];

}
