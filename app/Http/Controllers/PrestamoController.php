<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Support\Facades\Auth;
use App\Models\TipoEquipo;
use App\Models\Equipo;
use App\Models\RolUsuario;
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
        // traer la descripcion del rol del usuario logueado

        $user = Auth::user()->id_rol_user;
        // busar el rol de usuario del usuario logueado
        $rol = RolUsuario::where('id', $user)->first();
        // si el rol es administrador redireccionar a la vista de administrador
        if ($rol->descripcion == 'Administrador' || $rol->descripcion == 'administrador') {
            return redirect()->route('usuarios.main');
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

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        dd($request);
        // validar los campos
        $request->validate([
            'id_estudiante' => 'required',
            'id_equipo' => 'required',
            'fecha_solictud' => 'required',
            'fecha_devolucion_estimada' => 'required',
            'estado_prestamo' => 'required',
        ]);
        // crear el prestamo
        Prestamo::create([
            'id_estudiante' => $request->input('id_estudiante'),
            'id_equipo' => $request->input('id_equipo'),
            'fecha_solictud' => $request->input('fecha_solictud'),
            'fecha_devolucion_estimada' => $request->input('fecha_devolucion_estimada'),
            'estado_prestamo' => $request->input('estado_prestamo'),
        ]);

        // cambiar el estado del equipo a prestado
        $equipo = Equipo::find($request->input('id_equipo'));
        $equipo->estado_equipo = 1;
        $equipo->save();

        // redireccionar a la vista de prestamos
        return redirect()->route('usuarios.main')->with('Creado', 'Prestamo creado exitosamente.');
    }
}
