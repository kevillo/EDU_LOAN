<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RolUsuario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rol_usuarios';

    // relacion con la tabla usuarios
    public function User()
    {
        return $this->hasMany(User::class);
    }

    protected $fillable = [
        'descripcion',
    ];
}
