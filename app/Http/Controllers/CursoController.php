<?php

namespace App\Http\Controllers;

use App\Models\Curso;

use Illuminate\Support\Facades\Auth;

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

        return redirect()->route('estudiantes.create')->with('Creado', 'Curso creado exitosamente.');
    }
}
