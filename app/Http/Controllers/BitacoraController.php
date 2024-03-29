<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $bitacora = Bitacora::all()
            ->sortByDesc('created_at');
        return view('bitacora.bitacora', compact('bitacora'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'username_bit' => 'required',
            'tabla' => 'required',
            'cambio' => 'required',
        ]);

        $user = Auth::user();
        Bitacora::create([
            'username_bit' => $user->username,
            'tabla' => $request->input('tabla'),
            'cambio' => $request->input('cambio'),
        ]);


        return redirect()->route('bitacora')->with('Creado', 'bitacora');

    }


}
