<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Storage;
use App\Models\Estudiante;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    // funcion para ver los estudiantes

    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    // funcion para crear estudiantes
    public function create(Curso $cursos)
    {
        $cursos = Curso::all();
        $usuarios = User::all();

        return view('estudiantes.create', compact('cursos', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_curso' => 'required',
            'id_usuario' => 'required',
            'nombre_estudiante' => 'required|max:255|min:3',
            'apellido_estudiante' => 'required|max:255|min:3',
            'correo_estudiante' => 'required|email',
            'imagen_estudiante' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fecha_nacimiento_estudiante' => 'required|date|before:today',

        ]);
        $imagePath = $request->file('imagen_estudiante')->store('post_estudiantes', 'public');

        Estudiante::create([
            'id_curso' => $request->input('id_curso'),
            'id_usuario' => $request->input('id_usuario'),
            'nombre_estudiante' => $request->input('nombre_estudiante'),
            'apellido_estudiante' => $request->input('apellido_estudiante'),
            'correo_estudiante' => $request->input('correo_estudiante'),
            'imagen_estudiante' => $imagePath,
            'fecha_nacimiento_estudiante' => $request->input('fecha_nacimiento_estudiante'),
        ]);

        return redirect()->route('estudiantes.index')->with('Creado', 'Estudiante creado exitosamente.');
    }

    // funcion para editar estudiantes
    public function edit(Estudiante $estudiante)
    {
        $cursos = Curso::all();
        $usuarios = User::all();
        return view('estudiantes.edit', compact('estudiante', 'cursos', 'usuarios'));
    }

    // funcion para actualizar estudiantes
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'id_curso' => 'required',
            'id_usuario' => 'required',
            'nombre_estudiante' => 'required|max:255|min:3',
            'apellido_estudiante' => 'required|max:255|min:3',
            'correo_estudiante' => 'required|email',
            'imagen_estudiante' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'fecha_nacimiento_estudiante' => 'required|date|before:today',

        ]);

        // validar si ya existe una imagen
        if ($request->hasFile('imagen_estudiante')) {
            // eliminar imagen anterior
            Storage::disk('public')->delete($estudiante->imagen_estudiante);
            // guardar nueva imagen
            $imagePath = $request->file('imagen_estudiante')->store('post_estudiantes', 'public');
        } else {
            $imagePath = $estudiante->imagen_estudiante;
        }

        $estudiante->update([
            'id_curso' => $request->input('id_curso'),
            'id_usuario' => $request->input('id_usuario'),
            'nombre_estudiante' => $request->input('nombre_estudiante'),
            'apellido_estudiante' => $request->input('apellido_estudiante'),
            'correo_estudiante' => $request->input('correo_estudiante'),
            'imagen_estudiante' => $imagePath,
            'fecha_nacimiento_estudiante' => $request->input('fecha_nacimiento_estudiante'),
        ]);

        return redirect()->route('estudiantes.index')->with('Actualizado', 'Estudiante actualizado exitosamente.');
    }
    // fucnion para ver los detalles de los estudiantes con todo y curso y usuario
    public function show(Estudiante $estudiante)
    {
        // buscar el curso y el usuario del estudiante
        $cursos = Curso::find($estudiante->id_curso);
        $usuarios = User::find($estudiante->id_usuario);

        return view('estudiantes.show', compact('estudiante', 'cursos', 'usuarios'));
    }

    // funcion para eliminar estudiantes

    public function destroy(Estudiante $estudiante)
    {
        // eliminar imagen
        Storage::disk('public')->delete($estudiante->imagen_estudiante);
        // eliminar estudiante
        $estudiante->delete();
        return redirect()->route('estudiantes.index')->with('Eliminado', 'Estudiante eliminado exitosamente.');
    }
}
