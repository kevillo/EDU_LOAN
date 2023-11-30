<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\TipoEquipo;
use Illuminate\Http\Request;
use App\Models\Bitacora;


class TipoEquipoController extends Controller
{
    // function create
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('tipo_equipos.create');
    }

    // function store
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $request->validate([
            'descripcion_tipo_equipo' => 'required',
        ]);
        TipoEquipo::create([
            'descripcion_tipo_equipo' => $request->input('descripcion_tipo_equipo'),
        ]);

        $user = Auth::user();
        Bitacora::create([
            'username_bit' => $user->username,
            'tabla'=>$request->input('tabla'),
            'cambio'=>$request->input('cambio'),
        ]);



        return redirect()->route('equipos.create')->with('Exito', 'Tipo de equipo creado exitosamente');


    }
}
