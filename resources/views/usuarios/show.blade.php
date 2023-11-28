@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('../resources/css/usuarios/create.css') }}">
@endsection

@section('title')
<title>Detalles del Usuario</title>
@endsection

@section('content')

<div class="container mt-4 rounded shadow">
    <div class="row">
        <div class="col-md-3 ">
            <img src="../../resources/img/icon-usuario.png" alt="Icono de Usuario" class="img-fluid">
        </div>
        <div class="col-md-9 ">
            <h2>Detalles del Usuario</h2>

            <dl class="row">
                <dt class="col-sm-3">Rol Usuario:</dt>
                <dd class="col-sm-9">{{ $usuario->id_rol_user==1 ? 'Administrador' : 'Estudiante' }}</dd>

                <dt class="col-sm-3">Nombre o Usuario:</dt>
                <dd class="col-sm-9">{{ $usuario->username }}</dd>

                <dt class="col-sm-3">Correo electrónico:</dt>
                <dd class="col-sm-9">{{ $usuario->email }}</dd>

                <dt class="col-sm-3">Contraseña:</dt>
                <dd class="col-sm-9">********</dd>

                <dt class="col-sm-3">Disponibilidad:</dt>
                <dd class="col-sm-9">{{ $usuario->is_available==1 ? 'Activo' : 'Inactivo' }}</dd>
            </dl>

            <div class="mt-3">
                <a href="{{ route('usuarios.index') }}" class="btn btn-danger">Volver</a>
            </div>
        </div>
    </div>
</div>

@endsection