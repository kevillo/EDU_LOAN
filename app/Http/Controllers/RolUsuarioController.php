<?php

namespace App\Http\Controllers;

use App\Models\RolUsuario;
use Illuminate\Http\Request;

class RolUsuarioController extends Controller
{

    // create
    public function create()
    {
        return view('roles.create');
    }
    // function store
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
        ]);
        RolUsuario::create([
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('usuarios.create')->with('Creado', 'Rol creado exitosamente.');



    }


}
