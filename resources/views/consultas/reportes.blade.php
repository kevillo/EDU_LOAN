@extends('layouts.app')
@section('css')
 <link rel="stylesheet" href="{{asset('../resources/css/consultas/consulta.css')}}">   
@endsection

@section('title')
<title>Reportes</title>
@endsection

@section('content')
    <!--Reporte de Usuarios-->
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Reporte de Usuarios</h2> 
            <a href="{{route('consultas.pdf')}}" class="btn btn-success" target="_blank">Descargar PDF</a>
        </div>
        <table class="table table-bordered text-center table-container">
            <thead>
                <tr>
                    <th>Rol Usuario</th>
                    <th>Nombre o usuario</th>
                    <th>Correo electrónico</th>
                    <th>Disponibilidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id_rol_user}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->is_available}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!--Reporte de Equipos-->
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Reporte de Estudiantes</h2> 
            <a href="{{route('consultas.pdf')}}" class="btn btn-success" target="_blank">Descargar PDF</a>
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
                        <td>{{$$usuarios->username}}</td>
                        <td>{{$estudiante->nombre_estudiante}}</td>
                        <td>{{$estudiante->apellido_estudiante}}</td>
                        <td>{{$estudiante->correo_estudiante}}</td>
                        <td>{{$estudiante->fecha_nacimiento_estudiante}}</td>
                        <td>{{$cursos->nombre_curso}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
