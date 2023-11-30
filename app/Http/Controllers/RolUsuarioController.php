<?php

namespace App\Http\Controllers;

use App\Models\RolUsuario;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RolUsuarioController extends Controller
{

    // create
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('roles.create');
    }
    // function store
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $request->validate([
            'descripcion' => 'required',
        ]);
        RolUsuario::create([
            'descripcion' => $request->input('descripcion'),
        ]);

        $user = Auth::user();
        Bitacora::create([
            'username_bit' => $user->username,
            'tabla'=>$request->input('tabla'),
            'cambio'=>$request->input('cambio'),
        ]);

        return redirect()->route('usuarios.create')->with('Creado', 'Rol creado exitosamente.');



    }


}
