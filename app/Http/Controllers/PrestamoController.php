<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrestamoController extends Controller
{
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
