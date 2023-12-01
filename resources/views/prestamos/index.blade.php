@extends('layouts.app')


@section('title')
<title>Inicio</title>
@endsection


@section('content')
<div class="container">
    <br>
    <h2>Consulta de prestamos</h2>
    <h3 style="text-align: left; padding: 15px">Prestamos pendientes</h3>

    <!-- Tabla que  -->
    <table class="table table-bordered">
        <thead>
            <tr>
                @if (Auth::user()->id_rol_user == 1)
                <th class=" w-10 ">Estudiante a quien se le prestara el equipo</th>
                @endif
                <th>Equipo</th>
                <th>Fecha de devolución estimada</th>
                <th>Fecha de solicitud</th>
                <th>Estado de préstamo</th>
                @if (Auth::user()->id_rol_user == 1)
                <th>Acciones</th>
                @endif


            </tr>
        </thead>
        <tbody>
            @foreach ($prestamos as $prestamo)
            <tr>
                @if (Auth::user()->id_rol_user == 1)
                <td>{{$estudiantes->nombre_estudiante}}</td>
                @endif

                @foreach ($equipos as $equipo)
                @if ($prestamo->id_equipo == $equipo->id)
                <td>{{$equipo->nombre_equipo}}</td>
                @endif
                @endforeach
                <td>{{$prestamo->fecha_devolucion_estimada}}</td>
                <td>{{$prestamo->fecha_solictud}}</td>
                <td>{{$prestamo->estado_prestamo}}</td>
                @if (Auth::user()->id_rol_user == 1)
                <td>
                    <!-- esto es para que el administrador pueda aceptar o rechazar la solicitud de prestamo -->
                    <form action="{{route('prestamo.update',$prestamo->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        @if ($prestamo->estado_prestamo == 'Aceptado')

                        <button type="submit" class="btn btn-success" name="accion_devolver"
                            value="devolver">Devolver</button>
                        @else
                        <button type="submit" class="btn btn-success" name="accion_accept"
                            value="aceptar">Aceptar</button>
                        <button type="submit" class="btn btn-danger" name="accion_delete"
                            value="rechazar">Rechazar</button>
                        @endif

                    </form>
                </td>

                @endif


            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('usuarios.main') }}" class="btn btn-secondary">Regresar</a>
    <!-- para que el estudiante pueda ir a la vista de prestamos -->
    @if (Auth::user()->id_rol_user == 2)
    <a href="{{ route('prestamos.create') }}" class="btn btn-primary">Solicitar un nuevo prestamo</a>
    @endif


</div>

@endsection