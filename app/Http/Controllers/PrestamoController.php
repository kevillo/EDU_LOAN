<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Support\Facades\Auth;
use App\Models\TipoEquipo;
use App\Models\Equipo;
use App\Models\RolUsuario;
use App\Models\Bitacora;
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
            // los prestamos que estan aceptados o pendientes
            $prestamos = Prestamo::where('estado_prestamo', 'Pendiente')
                ->orWhere('estado_prestamo', 'Aceptado')
                ->orderByRaw("FIELD(estado_prestamo , 'Pendiente', 'Aceptado','Rechazado')")
                ->get();
        } else {
            // ordenando   los pendientes primero
            $estudiante_id = Auth::user()->id;
            $prestamos = Prestamo::where('id_estudiante', $estudiante_id)
                // ordenar los prestamos por estado, los pendientes primero
                ->orderByRaw("FIELD(estado_prestamo , 'Pendiente', 'Aceptado','Devuelto', 'Rechazado')")
                ->get();
        }

        $estudiantes = Estudiante::where('id_usuario', Auth::user()->id)->first();
        // traer el nombre del equipo en base al id_equipo de la tabla equipos
        $equipos = Equipo::all();


        return view('prestamos.index', compact('prestamos', 'estudiantes', 'equipos'));
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
        $diponible = '0';
        // traer todos los equipos  que esten disponibles
        $equipos = Equipo::where('estado_equipo', $diponible)->get();
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

        // actualizar el estado del equipo a prestado
        $en_espera = 2;
        $equipo = Equipo::find($request->input('id_equipo'));
        $equipo->estado_equipo = $en_espera;
        $equipo->save();

        // enviar a la bitacora el cambio de estado del equipo
        $user = Auth::user();
        Bitacora::create([
            'username_bit' => $user->username,
            'tabla' => $request->input('tabla'),
            'cambio' => $request->input('cambio'),
        ]);

        // redireccionar a la vista de prestamos
        return redirect()->route('usuarios.main')->with('Creado', 'Prestamo creado exitosamente.');
    }

    // funcion para cambiar el estado, dependiento del boton que se oprima, se cambia el estado del prestamo, hay 2 botones, 
    // uno para aceptar(accion_accept) y otro para rechazar(accion_delete)

    public function update(Request $request, $id)
    {
        // se busca el prestamo por el id
        $prestamo = Prestamo::find($id);
        // se busca cual "a" se oprimio
        if ($request->input('accion_accept')) {

            // si se oprimio el boton de aceptar, se cambia el estado del prestamo a aceptado
            $prestamo->estado_prestamo = 'Aceptado';
            $prestamo->save();
            // luego se actualiza la tabla equipos, cambiando el estado del equipo a prestado
            $equipo = Equipo::find($prestamo->id_equipo);
            $equipo->estado_equipo = 1;
            $equipo->save();
            // luego se rellena en la tabla de prestamo el id del usuario que acepto el prestamo, 
            // y la fecha del prestamo
            $prestamo->id_usuario = Auth::user()->id;
            $prestamo->fecha_prestamo = date('Y-m-d');
            $prestamo->save();

            // se envia a la bitacora el cambio de estado del prestamo
            $user = Auth::user();
            Bitacora::create([
                'username_bit' => $user->username,
                'tabla' => $request->input('tabla'),
                'cambio' => $request->input('cambio_aceptar'),
            ]);

            // se redirecciona a la vista de prestamos

            return redirect()->route('usuarios.main')->with('Actualizado', 'Prestamo aceptado exitosamente.');
        } elseif ($request->input('accion_delete')) {
            // si se oprimio el boton de rechazar, se cambia el estado del prestamo a rechazado
            $prestamo->estado_prestamo = 'Rechazado';
            // se guarda el cambio
            $prestamo->save();
            $user = Auth::user();
            Bitacora::create([
                'username_bit' => $user->username,
                'tabla' => $request->input('tabla'),
                'cambio' => $request->input('cambio_rechazar'),
            ]);

            // se redirecciona a la vista de prestamos
            return redirect()->route('usuarios.main')->with('Actualizado', 'Prestamo rechazado exitosamente.');
        }
        // si se oprimio el boton de devolver, se cambia el estado del prestamo a devuelto
        elseif ($request->input('accion_devolver')) {
            $prestamo->estado_prestamo = 'Devuelto';
            // la fecha de devolucion es la fecha de hoy
            $prestamo->fecha_devolucion_real = date('Y-m-d');
            // se guarda el cambio
            $prestamo->save();
            // luego se actualiza la tabla equipos, cambiando el estado del equipo a disponible
            $equipo = Equipo::find($prestamo->id_equipo);
            $equipo->estado_equipo = 0;
            $equipo->save();

            $user = Auth::user();
            Bitacora::create([
                'username_bit' => $user->username,
                'tabla' => $request->input('tabla'),
                'cambio' => $request->input('cambio_devolver'),
            ]);

            // se redirecciona a la vista de prestamos
            return redirect()->route('usuarios.main')->with('Actualizado', 'Prestamo devuelto exitosamente.');
        }


    }


}
