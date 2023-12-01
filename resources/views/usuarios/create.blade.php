@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/usuarios/create.css')}}">
@endsection

@section('title')
<title>Registrar Usuario</title>
@endsection



@section('content')

<br><br><br><br>
<form action="{{route('usuarios.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-3">
            <img src="../../resources/img/icon-usuario.png" alt="Icono de Usuario" width="100" height="100">
        </div>
        <div class="col-9">

            <!-- ID Rol Usuario -->
            <div class="mb-3">
                <label for="rol_usuario" class="form-label">Rol Usuario</label>
                <select class="form-select" id="rol_usuario" name="rol_usuario" required>
                    <option value="" disabled selected>Selecciona un rol de usuario</option>
                    @foreach ($roles as $rol)
                    <option value="{{$rol->id}}">{{$rol->descripcion}}</option>
                    @endforeach

                </select>
            </div>
            <a href="{{route('roles.create')}}" class="btn btn-success">Agregar Rol</a>
            <!-- Nombre -->
            <div class="mb-3">
                <label for="username" class="form-label">Nombre o Usuario</label>
                <input type="text" class="form-control" placeholder="Ingrese nombre" id="username" name="username"
                    required>
            </div>
            @if($errors->has('username'))
            <div class="alert alert-danger">
                {{ $errors->first('username') }}
            </div>
            @endif


            <!-- correo -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo electronico</label>
                <input type="email" class="form-control" placeholder="Ingrese su correo" id="email" name="email"
                    required>
            </div>

            @if($errors->has('email'))
            <div class="alert alert-danger">
                {{ $errors->first('email') }}
            </div>
            @endif

            <!-- Contraseña -->
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" placeholder="Ingrese contraseña" id="password"
                    name="password" required>
                <!-- Mostrar contraseña -->
                <input type="checkbox" id="showPassword" name="showPassword" class="checkbox" value="1">
                <label for="showPassword">Mostrar contraseña</label>

            </div>
            @if($errors->has('password'))
            <div class="alert alert-danger">
                {{ $errors->first('password') }}
            </div>
            @endif


            <!-- Disponibilidad -->
            <div class="mb-3">
                <label for="is_available" class="form-label">Disponibilidad</label>
                <select class="form-select" id="is_available" name="is_available" required>
                    <option value="" disabled selected>Seleccione la disponibilidad</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>

            <!--Datos de bitacora-->
            <input type="hidden" id="tabla" name="tabla" value="usuario">
            <input type="hidden" id="cambio" name="cambio" value="crear">

            <!-- Botón Cancelar -->
            <a href="{{route('usuarios.index')}}" class="btn btn-danger">Cancelar</a>
            <!-- Botón Registrar -->
            <button type="submit" class="btn btn-primary">Registrar</button>
            <br><br><br>
            <br>
            <br>
            <br>
        </div>
    </div>
</form>
</div>

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var passwordInput = document.getElementById('password');
        var showPasswordButton = document.getElementById('showPassword');

        showPasswordButton.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    });
</script>

@endsection
@endsection