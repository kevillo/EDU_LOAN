@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('../../css/estudiantes/create.css') }}">
@endsection

@section('title')
<title>Registrar Estudiante</title>
@endsection

@section('content')
<div class="container">
    <h2>Registro de Estudiantes</h2>
    <form action="{{route('estudiantes.store')}}" method="post" id="estudianteForm" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-3">
                <img src="../../resources/img/icon-estudiante.svg" alt="Icono de Estudiante" width="100" height="100">
            </div>
            <div class="col-9">

                <!-- ID Curso -->
                <div class="mb-3">
                    <label for="id_curso" class="form-label">Nombre del curso</label>
                    <select class="form-select" id="id_curso" name="id_curso" required>
                        <option value="" disabled selected>Selecciona un curso</option>
                        @foreach ($cursos as $curso)
                        <option value="{{$curso->id}}">{{$curso->nombre_curso}}</option>
                        @endforeach
                    </select>
                </div>
                <a href="{{route('cursos.create')}}" class="btn btn-success">Agregar Curso</a>
                @if($errors->has('id_curso'))
                <div class="alert alert-danger">
                    <p>Debe seleccionar un curso</p>
                </div>
                @endif
                <!-- ID USUARIO -->
                <div class="mb-3">
                    <label for="id_usuario" class="form-label">Nombre de usuario</label>
                    <select class="form-select" id="id_usuario" name="id_usuario" required>
                        <option value="" disabled selected>Selecciona un usuario</option>
                        @foreach ($usuarios as $usuario)
                        <option value="{{$usuario->id}}">{{$usuario->username}}</option>
                        @endforeach
                    </select>
                </div>
                @if($errors->has('id_usuario'))
                <div class="alert alert-danger">
                    <p>Debe seleccionar un usuario</p>
                </div>
                @endif

                <!-- boton para ir a agregar curso -->

                <!-- Nombre -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" placeholder="Ingrese nombre" id="nombre"
                        name="nombre_estudiante" required>
                </div>
                @if($errors->has('nombre_estudiante'))
                <div class="alert alert-danger">
                    <p>Debe ingresar un nombre</p>
                </div>
                @endif
                <!-- Apellido -->
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" placeholder="Ingrese apellido" id=" apellido"
                        name="apellido_estudiante" required>
                </div>
                @if($errors->has('apellido_estudiante'))
                <div class="alert alert-danger">
                    <p>Debe ingresar un apellido</p>
                </div>
                @endif

                <!-- Correo -->
                <div class=" mb-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" placeholder="Ingrese correo elecciorreo" id="correo"
                        name="correo_estudiante" required>
                </div>
                @if($errors->has('correo_estudiante'))
                <div class="alert alert-danger">
                    <p>Debe ingresar un correo</p>
                </div>
                @endif

                <!-- Fecha Nacimiento -->
                <div class="mb-3">
                    <label for="fechaNacimiento" class="form-label">Fecha Nacimiento</label>
                    <input type="date" class="form-control" id="fechaNacimiento" name="fecha_nacimiento_estudiante"
                        required>
                </div>
                @if($errors->has('fecha_nacimiento_estudiante'))
                <div class="alert alert-danger">
                    <p>Debe ingresar una fecha de nacimiento</p>
                </div>
                @endif


                <!-- Imagen -->
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen_estudiante" accept="image/*"
                        required>
                </div>


                @if($errors->has('imagen_estudiante'))
                <div class="alert alert-danger">
                    <p>{{$errors->first('imagen_estudiante')}}</p>
                </div>
                @endif

                <!--Datos de bitacora-->
            <input type="hidden" id="tabla" name="tabla" value="estudiante">
            <input type="hidden" id="cambio" name="cambio" value="crear">

                <!-- Botón Cancelar -->
                <a href="{{route('estudiantes.index')}}" class="btn btn-danger">Cancelar</a>
                <!-- Botón Registrar -->
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    </form>
</div>
<br>
<br>
<br>
<br>
@endsection