<?php

namespace App\Http\Controllers;


use App\Models\Equipo;
use App\Models\TipoEquipo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    // function index
    public function index(Equipo $equipo)
    {
        $equipos = Equipo::all();
        return view('equipos.index', compact('equipos'));
    }

    // function create
    public function create()
    {

        $tipos_equipos = TipoEquipo::all();
        return view('equipos.create', compact('tipos_equipos'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'id_tipo_equipo' => 'required',
            'numero_serie' => 'required',
            'nombre_equipo' => 'required',
            'marca_equipo' => 'required',
            'modelo_equipo' => 'required',
            'imagen_equipo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'color_equipo' => 'required',
            'estado_equipo' => 'required',
        ]);
        $imagenPath = $request->file('imagen_equipo')->store('equipos', 'public');

        Equipo::create([
            'id_tipo_equipo' => $request->input('id_tipo_equipo'),
            'numero_serie' => $request->input('numero_serie'),
            'nombre_equipo' => $request->input('nombre_equipo'),
            'marca_equipo' => $request->input('marca_equipo'),
            'modelo_equipo' => $request->input('modelo_equipo'),
            'imagen_equipo' => $imagenPath,
            'color_equipo' => $request->input('color_equipo'),
            'estado_equipo' => $request->input('estado_equipo'),
        ]);

        return redirect()->route('equipos.index')->with('Creado', 'Equipo creado exitosamente');
    }
    // edit
    public function edit(Equipo $equipo)
    {
        $tipos_equipos = TipoEquipo::all();
        return view('equipos.edit', compact('equipo', 'tipos_equipos'));
    }

    // update
    public function update(Request $request, Equipo $equipo)
    {

        $request->validate([
            'id_tipo_equipo' => 'required',
            'numero_serie' => 'required',
            'nombre_equipo' => 'required',
            'marca_equipo' => 'required',
            'modelo_equipo' => 'required',
            'imagen_equipo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'color_equipo' => 'required',
            'estado_equipo' => 'required',
        ]);

        if ($request->hasFile('imagen_equipo')) {
            Storage::disk('public')->delete($equipo->imagen_equipo);
            $imagenPath = $request->file('imagen_equipo')->store('equipos', 'public');
        } else {
            $imagenPath = $equipo->imagen_equipo;
        }

        $equipo->update([
            'id_tipo_equipo' => $request->input('id_tipo_equipo'),
            'numero_serie' => $request->input('numero_serie'),
            'nombre_equipo' => $request->input('nombre_equipo'),
            'marca_equipo' => $request->input('marca_equipo'),
            'modelo_equipo' => $request->input('modelo_equipo'),
            'imagen_equipo' => $imagenPath,
            'color_equipo' => $request->input('color_equipo'),
            'estado_equipo' => $request->input('estado_equipo'),
        ]);

        return redirect()->route('equipos.index')->with('Actualizado', 'Equipo actualizado exitosamente');
    }

    // show

    public function show(Equipo $equipo)
    {
        $tipo_equipo = TipoEquipo::find($equipo->id_tipo_equipo);
        return view('equipos.show', compact('equipo', 'tipo_equipo'));
    }

    // destroy

    public function destroy(Equipo $equipo)
    {
        Storage::disk('public')->delete($equipo->imagen_equipo);
        $equipo->delete();
        return redirect()->route('equipos.index')->with('Eliminado', 'Equipo eliminado exitosamente');
    }

}
