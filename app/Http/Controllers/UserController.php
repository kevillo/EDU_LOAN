<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
