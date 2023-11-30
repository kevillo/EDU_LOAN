@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/usuarios/index.css')}}">
@endsection


@section('content')

<main class="container mt-5">
    <table style="border:1px solid black;">
        <tr>
            <th>Usuario</th>
            <th>Cambio</th>
            <th>Tabla</th>
        </tr>
        @if(count($bitacora) > 0)
        @foreach ($bitacora as $bitacora)
        <section style="border:1px solid black;">
            <tr>
                <td>{{ $bitacora->username_bit }} </td>
                <td>{{ $bitacora->cambio }}</td>
                <td>{{ $bitacora->tabla }}</td>
            </tr>
        </section>
    </table>
    @endforeach

    @else
    <p class="no-usuario-message">No hay ningún dato.</p>
    @endif
    </div>
</main>

@section('js')
<script src="{{asset('../resources/js/usuarios/index.js')}}"></script>
<script src="{{asset('../resources/js/delete.js')}} "></script>

@endsection

@endsection