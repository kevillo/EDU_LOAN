<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RolUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // Función para mostrar la vista de inicio de sesión
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $roles = RolUsuario::all();
        return view('usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $request->validate([
            'rol_usuario' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'is_available' => 'required',
        ]);

        user::create([
            'id_rol_user' => $request->input('rol_usuario'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'is_available' => $request->input('is_available'),
        ]);

        return redirect()->route('usuarios.index')->with('Creado', 'Usuario creado exitosamente.');
    }

    public function show(user $usuario)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('usuarios.show', compact('usuario'));
    }
    public function edit(user $usuario)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $roles = RolUsuario::all();
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    public function update(Request $request, user $usuario)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $request->validate([
            'rol_usuario' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'is_available' => 'required',
        ]);

        $usuario->update([
            'id_rol_user' => $request->input('rol_usuario'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'is_available' => $request->input('is_available'),
        ]);

        return redirect()->route('usuarios.index')->with('Actualizado', 'Usuario actualizado exitosamente.');
    }

    public function destroy(user $usuario)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('Eliminado', 'Usuario eliminado exitosamente.');
    }

    // Función para iniciar sesión
    public function login(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Verifica el tipo de rol y redirige según el caso
            if ($user->id_rol_user == 1) {
                return redirect()->route('inicio'); // Ruta para administradores
            } elseif ($user->id_rol_user == 2) {
                return redirect()->route('inicio'); // Ruta para estudiantes
            }
        }

        // La autenticación falló
        return redirect()->route('login')->with('error', 'Usuario o contraseña incorrectos');
    }
    // Función para cerrar sesión

    public function logout(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}
