<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'id_usuario' => 'required',
            'tabla_afectada' => 'required',
            'fecha_accion' => 'required',
            'detalle_accion' => 'required',
        ]);
        $log = new Log;
        $log->id_usuario = $request->id_usuario;
        $log->tabla_afectada = $request->tabla_afectada;
        $log->fecha_accion = $request->fecha_accion;
        $log->detalle_accion = $request->detalle_accion;
        $log->save();
        return redirect('/logs')->with('correcto', 'Log creado exitosamente');
    }
}
