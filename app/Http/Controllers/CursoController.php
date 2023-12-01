<?php

namespace App\Http\Controllers;

use App\Models\Curso;

use Illuminate\Support\Facades\Auth;
use App\Models\Bitacora;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $request->validate([
            'nombre_curso' => 'required'
        ]);

        Curso::create([
            'nombre_curso' => $request->input('nombre_curso')
        ]);

        $user = Auth::user();
        
        Bitacora::create([
            'username_bit' => $user->username,
            'tabla'=>$request->input('tabla'),
            'cambio'=>$request->input('cambio'),
        ]);

        return redirect()->route('estudiantes.create')->with('Creado', 'Curso creado exitosamente.');
    }
}
