<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nombre_curso' => 'required'
        ]);

        Curso::create([
            'nombre_curso' => $request->input('nombre_curso')
        ]);

        return redirect()->route('estudiantes.create')->with('Creado', 'Curso creado exitosamente.');
    }
}
