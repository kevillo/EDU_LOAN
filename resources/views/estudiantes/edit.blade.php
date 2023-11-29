@extends('layouts.app')


@section('title')
<title>Actualizar Estudiante</title>
@endsection

@section('content')
<div class="container rounded shadow mt-1">
    <h2 class="p-3 text-center">Actualizacion de Estudiantes</h2>

    <form action="{{route('estudiantes.update',$estudiante->id)}}" method="post" id="estudianteForm"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-3">
                <img src="../../../resources/img/icon-estudiante.svg" class="img img-fluid card-img"
                    alt="Icono de Estudiante" width="100" height="100">
            </div>
            <div class="col-md-9">

                <!-- ID Curso -->
                <div class="mb-3">
                    <label for="id_curso" class="form-label">Nombre del curso</label>
                    <select class="form-select" id="id_curso" name="id_curso" required>
                        <option value="" disabled selected>Selecciona un curso</option>
                        @foreach ($cursos as $curso)
                        <option value="{{$curso->id}}">{{$curso->nombre_curso}}</option>
                        @endforeach
                    </select>
                    <a href="{{route('cursos.create')}}" class="btn btn-success mt-2">Agregar Curso</a>
                    @if($errors->has('id_curso'))
                    <div class="alert alert-danger mt-2">
                        <p>Debe seleccionar un curso</p>
                    </div>
                    @endif
                </div>

                <!-- ID USUARIO -->
                <div class="mb-3">
                    <label for="id_usuario" class="form-label">Nombre de usuario</label>
                    <select class="form-select" id="id_usuario" name="id_usuario" required>
                        <option value="" disabled selected>Selecciona un usuario</option>
                        @foreach ($usuarios as $usuario)
                        <option value="{{$usuario->id}}">{{$usuario->username}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('id_usuario'))
                    <div class="alert alert-danger mt-2">
                        <p>Debe seleccionar un usuario</p>
                    </div>
                    @endif
                </div>

                <!-- Nombre -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" placeholder="Ingrese nombre" id="nombre"
                        value="{{$estudiante->nombre_estudiante}}" name="nombre_estudiante" required>
                    @if($errors->has('nombre_estudiante'))
                    <div class="alert alert-danger mt-2">
                        <p>Debe ingresar un nombre</p>
                    </div>
                    @endif
                </div>

                <!-- Apellido -->
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" placeholder="Ingrese apellido" id="apellido"
                        name="apellido_estudiante" value="{{$estudiante->apellido_estudiante}}" required>
                    @if($errors->has('apellido_estudiante'))
                    <div class="alert alert-danger mt-2">
                        <p>Debe ingresar un apellido</p>
                    </div>
                    @endif
                </div>

                <!-- Correo -->
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" placeholder="Ingrese correo electrónico" id="correo"
                        name="correo_estudiante" value="{{$estudiante->correo_estudiante}}" required>
                    @if($errors->has('correo_estudiante'))
                    <div class="alert alert-danger mt-2">
                        <p>Debe ingresar un correo electrónico válido</p>
                    </div>
                    @endif
                </div>

                <!-- Fecha Nacimiento -->
                <div class="mb-3">
                    <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fechaNacimiento" name="fecha_nacimiento_estudiante"
                        value="{{$estudiante->fecha_nacimiento_estudiante}}" required>
                    @if($errors->has('fecha_nacimiento_estudiante'))
                    <div class="alert alert-danger mt-2">
                        <p>Debe ingresar una fecha de nacimiento</p>
                    </div>
                    @endif
                </div>

                <!-- Imagen -->
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen_estudiante" accept="image/*"
                        required>
                    @if($errors->has('imagen_estudiante'))
                    <div class="alert alert-danger mt-2">
                        <p>{{$errors->first('imagen_estudiante')}}</p>
                    </div>
                    @endif
                </div>

                <!-- Botones -->
                <div class="mb-3">
                    <a href="{{route('estudiantes.index')}}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </div>
    </form>


</div>
<br><br><br><br><br>
@endsection