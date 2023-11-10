<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {


        $request->validate([
            'id_rol_user' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'is_available' => 'required',
        ]);


        //save
        $user = new User;
        $user->id_rol_user = $request->id_rol_user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_available = $request->is_available;
        $user->password = $request->password;
        $user->save();

        return redirect()->route('user.index')
            ->with('correcto', 'Usuario creado exitosamente.');
    }
}
