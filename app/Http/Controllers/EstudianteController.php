<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'nombre_curso' => 'required',            
        ]);
        $curso = new Curso;
        $curso->nombre_curso = $request->nombre_curso;
        $curso->save();
        return redirect('/cursos')->with('correcto', 'Curso creado exitosamente');
    }
}
