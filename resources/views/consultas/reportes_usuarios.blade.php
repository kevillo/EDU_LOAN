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
        <a href="{{route('consultas.Updf')}}" class="btn btn-success" target="_blank">Descargar PDF</a>
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
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('consultas.index')}}" class="btn btn-primary">Regresar</a>
        </div>
    </div>
    @endsection