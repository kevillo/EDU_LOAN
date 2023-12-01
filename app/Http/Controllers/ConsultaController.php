<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Equipo;
use App\Models\Estudiante;
use App\Models\Prestamo;
use App\Models\Curso;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ConsultaController extends Controller
{
    public function index()
    {
        $users = User::all();
        $equipos = Equipo::all();
        $estudiantes = Estudiante::all();
        $prestamos = Prestamo::all();
        $cursos = Curso::find($estudiantes->id_curso);
        $usuarios = User::find($estudiantes->id_usuario);
        return view('consultas.reportes', compact('users', 'equipos', 'estudiantes', 'prestamos'));
    }

    public function pdf()
    {
        $usuario = User::all();
        $equipos = Equipo::all();
        $estudiantes = Estudiante::all();
        $prestamos = Prestamo::all();
        $cursos = Curso::find($estudiantes->id_curso);
        $usuarios = User::find($estudiantes->id_usuario);
        $pdf = Pdf::loadView('consultas.pdf', compact('usuario', 'equipos', 'estudiantes', 'prestamos'));
        return $pdf->stream();
    }
}
