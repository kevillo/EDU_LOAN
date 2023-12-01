@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('path/to/custom/css/usuarios/index.css') }}">
@endsection

@section('content')
<h2 class="text-center">Bitácora</h2>
<div class="container p-5">
    @if(count($bitacora) > 0)
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Usuario</th>
                    <th>Cambio</th>
                    <th>Tabla</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bitacora as $registro)
                <tr>
                    <td>{{ $registro->username_bit }}</td>
                    <td>{{ $registro->cambio }}</td>
                    <td>{{ $registro->tabla }}</td>
                    <td>{{ $registro->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="no-usuario-message">No hay ningún dato.</p>
    @endif

    <a href="{{route('usuarios.main')}}" class="btn btn-primary">Regresar</a>
</div>

<!-- regresar-->

@endsection