@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/usuarios/create.css')}}">
@endsection

@section('title')
<title>Registrar Usuario</title>
@endsection



@section('content')

<form action="{{route('usuarios.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-3">
            <img src="../resources/img/icon-usuario.png" alt="Icono de Usuario" width="100" height="100">
        </div>
        <div class="col-9">
            <!-- ID Usuario -->
            <div class="mb-3">
                <label for="id_usuario" class="form-label">ID Usuario</label>
                <input type="text" class="form-control" id="id_usuario" name="id_usuario" disabled>
            </div>
            <!-- ID Rol Usuario -->
            <div class="mb-3">
                <label for="rol_usuario" class="form-label">Rol Usuario</label>
                <select class="form-select" id="rol_usuario" name="rol_usuario" required>
                    <option value="" disabled selected>Selecciona un rol de usuario</option>
                    <option value="1">Administrador</option>
                    <option value="2">Estudiante</option>
                </select>
            </div>
            <!-- Nombre -->
            <div class="mb-3">
                <label for="username" class="form-label">Nombre o Usuario</label>
                <input type="text" class="form-control" placeholder="Ingrese nombre" id="username" name="username"
                    required>
            </div>
            <!-- correo -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo electronico</label>
                <input type="email" class="form-control" placeholder="Ingrese su correo" id="email" name="email"
                    required>
            </div>
            <!-- Contraseña -->
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" placeholder="Ingrese contraseña" id="password"
                    name="password" required>
            </div>
            <!-- Disponibilidad -->
            <div class="mb-3">
                <label for="is_available" class="form-label">Disponibilidad</label>
                <select class="form-select" id="is_available" name="is_available" required>
                    <option value="" disabled selected>Seleccione la disponibilidad</option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
            </div>

            <!-- Botón Cancelar -->
            <a href="#" class="btn btn-danger">Cancelar</a>
            <!-- Botón Registrar -->
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </div>
</form>
</div>
@endsection