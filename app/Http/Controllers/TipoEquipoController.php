<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipoEquipoController extends Controller
{
    // function store

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
        ]);

        $tipoEquipo = new TipoEquipo;
        $tipoEquipo->descripcion = $request->descripcion;
        $tipoEquipo->save();
        
    }
}
