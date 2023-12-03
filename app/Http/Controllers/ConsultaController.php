<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Equipo;
use App\Models\Estudiante;
use App\Models\Prestamo;
use App\Models\Curso;
use App\Models\TipoEquipo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ConsultaController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }


        return view('consultas.index');
    }
    public function usuarios_index()
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $users = User::all();
        return view('consultas.reportes_usuarios', compact('users'));
    }
    public function estudiantes_index()
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $users = User::all();
        $equipos = Equipo::all();
        $estudiantes = Estudiante::all();
        $prestamos = Prestamo::all();
        $cursos = Curso::all();
        return view('consultas.reportes_estudiantes', compact('estudiantes', 'cursos', 'users'));
    }
    public function equipos_index()
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }
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

        if (!Auth::check()) {
            return redirect()->route('login');
        }
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

        if (!Auth::check()) {
            return redirect()->route('login');
        }
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

        if (!Auth::check()) {
            return redirect()->route('login');
        }
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

        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $users = User::all();
        $equipos = Equipo::all();
        $estudiantes = Estudiante::all();
        $prestamos = Prestamo::all();
        $cursos = Curso::all();
        $tipos = TipoEquipo::all();
        $Eqpdf = Pdf::loadView('consultas.equipos_pdf', compact('cursos', 'estudiantes', 'users', 'equipos', 'tipos'));
        return $Eqpdf->stream();
    }

    public function Prestamos_pdf()
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }
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
