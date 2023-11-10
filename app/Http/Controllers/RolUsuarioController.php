<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolUsuarioController extends Controller
{
    // function store
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
        ]);

        $rolUsuario = new RolUsuario;
        $rolUsuario->descripcion = $request->descripcion;
        $rolUsuario->save();
        
    }

    
}
