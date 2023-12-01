@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/usuarios/index.css')}}">
@endsection


@section('content')
<div class="container">

    @if(count($bitacora) > 0)
    <table style="border:1px solid black;">
        <tr>
            <th>Usuario</th>
            <th>Cambio</th>
            <th>Tabla</th>
        </tr>
        @foreach ($bitacora as $bitacora)
        <tr>
            <td>{{ $bitacora->username_bit }} </td>
            <td>{{ $bitacora->cambio }}</td>
            <td>{{ $bitacora->tabla }}</td>
        </tr>
        @endforeach
    </table>
    @else
    <p class="no-usuario-message">No hay ningún dato.</p>
    @endif
</div>
</div>

@section('js')
<script src="{{asset('../resources/js/usuarios/index.js')}}"></script>
<script src="{{asset('../resources/js/delete.js')}} "></script>
@endsection

@endsection