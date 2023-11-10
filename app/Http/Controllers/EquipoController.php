<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipoController extends Controller
{
    // function store

    // campos: id, id_tipo_equipo, numero_serie, nombre_equipo, marca_equipo, modelo_equipo, color_equipo, estado_equipo

    public function store(Request $request)
    {

        $request->validate([
            'id_tipo_equipo' => 'required',
            'num_serie_equipo' => 'required',
            'nombre' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'color' => 'required',
            'estado' => 'required',
        ]);

        $equipo = new Equipo;
        $equipo->id_tipo_equipo = $request->id_tipo_equipo;
        $equipo->numero_serie = $request->num_serie_equipo;
        $equipo->nombre_equipo = $request->nombre;
        $equipo->marca_equipo = $request->marca;
        $equipo->modelo_equipo = $request->modelo;
        $equipo->color_equipo = $request->color;
        $equipo->estado_equipo = $request->estado;
        $equipo->save();


        return redirect('/equipos')->with('correcto', 'Equipo creado exitosamente');
    }
}
