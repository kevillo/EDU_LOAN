@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('/css/consultas/consulta.css')}}">
@endsection

@section('title')
<title>Reportes</title>
@endsection

@section('content')
<!--Reporte de Equipos-->
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Reporte de Estudiantes</h2>
        <a href="{{route('consultas.Epdf')}}" class="btn btn-success" target="_blank">Descargar PDF</a>
    </div>
    <table class="table table-bordered text-center table-container">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo electrónico</th>
                <th>Fecha Nacimiento</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantes as $estudiante)
            <tr>
                @foreach ($users as $user)
                @if ($user->id_user == $estudiante->id_user)
                <td>{{$user->username}}</td>
                @endif
                @endforeach

                <td>{{$estudiante->nombre_estudiante}}</td>
                <td>{{$estudiante->apellido_estudiante}}</td>
                <td>{{$estudiante->correo_estudiante}}</td>
                <td>{{$estudiante->fecha_nacimiento_estudiante}}</td>
                @foreach ($cursos as $curso)
                @if ($curso->id == $estudiante->id_curso)
                <td>{{$curso->nombre_curso}}</td>
                @endif
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('consultas.index')}}" class="btn btn-primary">Regresar</a>
        </div>
    </div>
    @endsection