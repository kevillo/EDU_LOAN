<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RolUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bitacora;

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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|regex:^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*^',
            'is_available' => 'required',
        ]);

        user::create([
            'id_rol_user' => $request->input('rol_usuario'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'is_available' => $request->input('is_available'),
        ]);

        $user = Auth::user();
        Bitacora::create([
            'username_bit' => $user->username,
            'tabla' => $request->input('tabla'),
            'cambio' => $request->input('cambio'),
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

        $user = Auth::user();
        Bitacora::create([
            'username_bit' => $user->username,
            'tabla' => $request->input('tabla'),
            'cambio' => $request->input('cambio'),
        ]);

        return redirect()->route('usuarios.index')->with('Actualizado', 'Usuario actualizado exitosamente.');
    }

    public function destroy(user $usuario, $tabla = "tabla", $cambio = "cambio")
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        Bitacora::create([
            'username_bit' => $user->username,
            $tabla => "usuario",
            $cambio => "eliminacion",
        ]);

        $usuario->delete();
        return redirect()->route('usuarios.index')->with('Eliminado', 'Usuario eliminado exitosamente.');
    }

    // Función para iniciar sesión
    public function login(Request $request)
    {

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Verifica el tipo de rol y redirige según el caso
            if ($user->id_rol_user == 1 && $user->is_available == 1) {
                return redirect()->route('usuarios.main'); // Ruta para administradores
            } elseif ($user->id_rol_user == 2 && $user->is_available == 1) {
                return redirect()->route('usuarios.main'); // Ruta para estudiantes
            } elseif ($user->is_available == 0) {
                return redirect()->route('login')->with('error', 'Usuario inactivo');
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

    public function main()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('main');
    }
    public function buscar(Request $request)
    {
        $nombre = $request->input('nombre');
        $usuario = User::where('username', 'like', '%' . $nombre . '%')->get();
        return view('usuarios.index', ['usuarios' => $usuario]);
    }


}
