<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'rol_usuario' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'is_available' => 'required',
        ]);


        //save
        $user = new User();
        $user->id_rol_user = $request->input('rol_usuario');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->is_available = $request->input('is_available');
        $user->save();

        return redirect('/usuario')->with('exito', 'Usuario creado exitosamente.');
    }

    public function Inicio(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Verifica el tipo de rol y redirige según el caso
            if ($user->id_rol_user == 1) {
                return redirect('/inicioAdmin'); // Ruta para administradores
            } elseif ($user->id_rol_user == 2) {
                return redirect('/InicioEstudiantes'); // Ruta para estudiantes
            } else {
                return redirect('default.dashboard'); // Ruta por defecto
            }
        }

        // La autenticación falló
        return redirect('/login')->with('error', 'Usuario o contraseña incorrectos');
    }
}
