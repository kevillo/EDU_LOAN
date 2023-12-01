@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="../resources/css/estilo_prestamos.css">
@endsection

@section('title')
<title>Registrar Préstamo</title>
@endsection

@section('content')
<div class="container">
    <h2>Registro de Préstamos</h2>
    <!-- Tabla info equipos dispo -->
    <h3 style="text-align: left; padding: 15px">Información de Equipos Disponibles</h3>
    <table class="table table-bordered text-center table-container">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número de serie</th>
                <th>Tipo de equipo</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Imagen</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipos as $equipo)
            <tr>
                <td>{{$equipo->id}}</td>
                <td>{{$equipo->numero_serie}}</td>
                @foreach ($tipo_equipos as $tipo_equipo)
                @if ($equipo->id_tipo_equipo == $tipo_equipo->id)
                <td>{{$tipo_equipo->descripcion_tipo_equipo}}</td>
                @endif
                @endforeach

                <td>{{$equipo->nombre_equipo}}</td>
                <td>{{$equipo->marca_equipo}}</td>
                <td><img src="{{ asset('storage/' . $equipo->imagen_equipo) }}"
                        style="max-width: 100px; display: block; margin-left: auto; margin-right: auto;"
                        class="img img-fluid" alt="">
                </td>
                <td>{{$equipo->modelo_equipo}}</td>
                <td>{{$equipo->color_equipo}}</td>
                <td>{{$equipo->estado_equipo==0?"Disponible":"Prestado"}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br><br>

    <!-- Tabla solicitud préstamos -->
    <h3 style="text-align: left; padding: 15px">Solicitud de préstamos</h3>
    <form action="{{ route('prestamos.store') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class=" w-10 ">Estudiante a quien se le prestara el equipo</th>
                    <th>Equipo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" class="form-control" id="estudiante" name="nombre_estudiante"
                            value="{{$estudiantes->nombre_estudiante}}" readonly>
                        <input type="hidden" class="form-control" id="estudiante" name="id_estudiante"
                            value="{{$estudiantes->id}}" readonly>
                    </td>
                    <td>
                        <select class="form-select" id="equipo" name="id_equipo" required>
                            <option value="" disabled selected>Selecciona un equipo</option>
                            @foreach ($equipos as $equipo)
                            <option value="{{$equipo->id}}">{{$equipo->nombre_equipo}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        @if ($errors->has('id_equipo'))
        <div class="alert alert-danger">
            {{ $errors->first('id_equipo') }}
        </div>
        @endif

        @if ($errors->has('id_estudiante'))
        <div class="alert alert-danger">
            {{ $errors->first('id_estudiante') }}
        </div>
        @endif

        <!-- fecha de devolucion estimada -->
        <div class="form-group">
            <label for="fecha_devolucion_estimada">Fecha de devolución estimada</label>
            <input type="date" class="form-control" id="fecha_devolucion_estimada" name="fecha_devolucion_estimada"
                required>
        </div>
        <br>
        @if ($errors->has('fecha_devolucion_estimada'))
        <div class="alert alert-danger">
            {{ $errors->first('fecha_devolucion_estimada') }}
        </div>
        @endif


        <!-- campo fecha establecida, que tenga un valor por defecto  de el dia de hoy-->
        <div class="form-group">
            <input type="hidden" class="form-control" id="fecha_solictud" name="fecha_solictud" required
                value="{{date('Y-m-d')}}">
        </div>

        @if ($errors->has('fecha_solictud'))
        <div class="alert alert-danger">
            {{ $errors->first('fecha_solictud') }}
        </div>
        @endif
        <br>
        <!-- campo de estado de prestamo que diga "Pendiente" que este oculto -->
        <input type="hidden" class="form-control" id="estado_prestamo" name="estado_prestamo" required
            value="Pendiente">
        @if ($errors->has('estado_prestamo'))
        <div class="alert alert-danger">
            {{ $errors->first('estado_prestamo') }}
        </div>
        @endif


        <!-- Botón Cancelar -->
        <a href="{{route('usuarios.main')}}" class="btn btn-danger float-start" style="margin-right: 10px;">Cancelar</a>
        <!-- Botón Registrar -->
        <button type="submit" class="btn btn-primary float-start">Solicitar Préstamo</button>


        <input type="hidden" id="tabla" name="tabla" value="Prestamo">
        <input type="hidden" id="cambio" name="cambio" value="Prestamo solicitado">
    </form>
    <!-- boton para ver mis prestamos pendientes -->
    <a href="{{route('prestamos.index')}}" class="btn btn-primary float-end">Ver mis préstamos pendientes</a>
</div>

@endsection