<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Bitacora::all();
        return view('bitacora', compact('bitacora'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username_bit' => 'required',
            'tabla' => 'required',
            'cambio' => 'required',
        ]);

        Bitacora::create([
            'username_bit' => $request->input('username'),
            'tabla' => $request->input('tabla'),
            'cambio' => $request->input('cambio'),
        ]);


        return redirect()->route('bitacora')->with('Creado', 'bitacora');

    }


}
