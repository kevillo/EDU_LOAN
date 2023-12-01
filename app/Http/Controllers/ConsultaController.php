<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Equipo;
use App\Models\Estudiante;
use App\Models\Prestamo;
use App\Models\Curso;
use App\Models\TipoEquipo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ConsultaController extends Controller
{
    public function index()
    {
        return view('consultas.index');
    }
    public function usuarios_index()
    {
        $users = User::all();
        return view('consultas.reportes_usuarios', compact('users'));
    }
    public function estudiantes_index()
    {
        $users = User::all();
        $equipos = Equipo::all();
        $estudiantes = Estudiante::all();
        $prestamos = Prestamo::all();
        $cursos = Curso::all();
        return view('consultas.reportes_estudiantes', compact('estudiantes', 'cursos', 'users'));
    }
    public function equipos_index()
    {
        $users = User::all();
        $equipos = Equipo::all();
        $estudiantes = Estudiante::all();
        $prestamos = Prestamo::all();
        $cursos = Curso::all();
        $tipos = TipoEquipo::all();
        return view('consultas.reportes_equipos', compact('estudiantes', 'users', 'equipos', 'tipos'));
    }
    // pretamos

    public function prestamos_index()
    {
        $users = User::all();
        $equipos = Equipo::all();
        $estudiantes = Estudiante::all();
        $prestamos = Prestamo::all();
        $cursos = Curso::all();
        $tipos = TipoEquipo::all();
        return view('consultas.reportes_prestamos', compact('estudiantes', 'users', 'equipos', 'tipos', 'prestamos'));
    }


    /*generacion de pdf */
    public function Usuarios_pdf()
    {
        $usuario = User::all();
        $equipos = Equipo::all();
        $estudiantes = Estudiante::all();
        $prestamos = Prestamo::all();
        $cursos = Curso::all();
        $Updf = Pdf::loadView('consultas.usuario_pdf', compact('usuario'));
        return $Updf->stream();
    }
    public function Estudiantes_pdf()
    {
        $users = User::all();
        $equipos = Equipo::all();
        $estudiantes = Estudiante::all();
        $prestamos = Prestamo::all();
        $cursos = Curso::all();
        $Epdf = Pdf::loadView('consultas.estudiantes_pdf', compact('cursos', 'estudiantes', 'users'));
        return $Epdf->stream();
    }

    public function Equipos_pdf()
    {
        $users = User::all();
        $equipos = Equipo::all();
        $estudiantes = Estudiante::all();
        $prestamos = Prestamo::all();
        $cursos = Curso::all();
        $tipos = TipoEquipo::all();
        $Epdf = Pdf::loadView('consultas.equipos_pdf', compact('cursos', 'estudiantes', 'users', 'equipos', 'tipos'));
        return $Epdf->stream();
    }

    public function Prestamos_pdf()
    {
        $users = User::all();
        $equipos = Equipo::all();
        $estudiantes = Estudiante::all();
        $prestamos = Prestamo::all();
        $cursos = Curso::all();
        $tipos = TipoEquipo::all();
        $Ppdf = Pdf::loadView('consultas.prestamos_pdf', compact('cursos', 'estudiantes', 'users', 'equipos', 'tipos', 'prestamos'));
        return $Ppdf->stream();
    }
}
