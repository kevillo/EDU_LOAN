<?php

namespace App\Http\Controllers;

use App\Models\TipoEquipo;
use Illuminate\Http\Request;

class TipoEquipoController extends Controller
{
    // function create
    public function create()
    {
        return view('tipo_equipos.create');
    }

    // function store
    public function store(Request $request)
    {
        $request->validate([
            'descripcion_tipo_equipo' => 'required',
        ]);
        TipoEquipo::create([
            'descripcion_tipo_equipo' => $request->input('descripcion_tipo_equipo'),
        ]);

        return redirect()->route('equipos.create')->with('Exito', 'Tipo de equipo creado exitosamente');


    }
}
