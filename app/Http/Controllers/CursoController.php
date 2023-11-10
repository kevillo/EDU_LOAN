<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required',            
        ]);
        $curso = new Curso;
        $curso->nombre = $request->nombre;
        $curso->save();
        return redirect('/cursos')->with('correcto', 'Curso creado exitosamente');
    }
}
