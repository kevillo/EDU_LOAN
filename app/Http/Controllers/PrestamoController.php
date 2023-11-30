<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Support\Facades\Auth;
use App\Models\TipoEquipo;
use App\Models\Equipo;
use App\Models\User;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{

    public function index()
    {
        // esta ruta se accede solo si estas logueado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        //  muestra solo los prestamos que estan en estado pendiente
        if (Auth::user()->id_rol_user == 1) {
            $prestamos = Prestamo::where('estado_prestamo', 'pendiente')->get();
        } else {
            $estudiante_id = Auth::user()->id;
            $prestamos = Prestamo::where('estado_prestamo', 'pendiente')->where('id', $estudiante_id)->get();
        }

        return view('prestamos.create', compact('prestamos'));




    }
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->id_rol_user == 1) {
            return redirect()->route('inicio');
        }
        // traer todos los equipos  que esten disponibles
        $equipos = Equipo::where('estado_equipo', '0')->get();
        // buscar el tipo equipo de los equipos para mostrar la descripcion_tipo_equipo con where
        $tipo_equipos = TipoEquipo::all();

        // buscar el estudiante que esta logueado en base al id_usuario de la tabla estudiantes
        $estudiantes = Estudiante::where('id_usuario', Auth::user()->id)->first();



        return view('prestamos.create', compact('equipos', 'tipo_equipos', 'estudiantes'));

    }

    public function store(Request $request)
    {



        $request->validate([
            'fecha_solicitud' => 'required',
            'fecha_prestamo' => 'required',
            'fecha_devolucion_estimada' => 'required',
            'fecha_devolucion_real' => 'required',
            'estado_prestamo' => 'required',
        ]);

        $prestamo = new Prestamo;
        $prestamo->fecha_solicitud = $request->fecha_solicitud;
        $prestamo->fecha_prestamo = $request->fecha_prestamo;
        $prestamo->fecha_devolucion_estimada = $request->fecha_devolucion_estimada;
        $prestamo->fecha_devolucion_real = $request->fecha_devolucion_real;
        $prestamo->estado_prestamo = $request->estado_prestamo;
        $prestamo->save();

        return redirect('/prestamos')->with('correcto', 'Prestamo creado exitosamente');

    }
}
