<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use HasFactory;
    use SoftDeletes;

    // relacion con la tabla usuarios

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }


}
