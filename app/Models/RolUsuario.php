<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolUsuario extends Model
{
    use HasFactory;

    protected $table = 'rol_usuarios';

    // relacion con la tabla usuarios
    public function User()
    {
        return $this->hasMany(User::class);
    }
    
}
