@extends('layouts.app')

@section('title')
<title>Editar Equipo</title>
@endsection

@section('content')
<div class="container">
    <h2 class="mt-4 mb-4">Editar Equipo</h2>

    <form action="{{ route('equipos.update', $equipo->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-3 text-center mb-4">
                <img src="{{asset('storage/' . $equipo->imagen_equipo)}}" alt="Icono de Equipos"
                    class="img-fluid rounded">
            </div>

            <div class="col-md-9">

                <!-- Número de serie -->
                <div class="mb-3">
                    <label for="num_serie_equipo" class="form-label">Número de serie</label>
                    <input type="text" class="form-control" id="num_serie_equipo" name="numero_serie"
                        value="{{ $equipo->numero_serie }}" required>
                </div>
                @if ($errors->has('numero_serie'))
                <div class="alert alert-danger">
                    {{ $errors->first('numero_serie') }}
                </div>
                @endif

                <!-- ID Tipo Equipo -->
                <div class="mb-3">
                    <label for="id_tipo_equipo" class="form-label">Tipo de equipo</label>
                    <select class="form-select" id="id_tipo_equipo" name="id_tipo_equipo" required>
                        <option value="" disabled>Selecciona un tipo de equipo</option>
                        @foreach ($tipos_equipos as $tipo_equipo)
                        <option value="{{ $tipo_equipo->id }}" @if ($tipo_equipo->id === $equipo->id_tipo_equipo)
                            selected @endif>
                            {{ $tipo_equipo->descripcion_tipo_equipo }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('id_tipo_equipo'))
                <div class="alert alert-danger">
                    {{ $errors->first('id_tipo_equipo') }}
                </div>
                @endif

                <!-- Nombre, Marca, Modelo, Color -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre_equipo"
                                value="{{ $equipo->nombre_equipo }}" required>
                        </div>
                        @if ($errors->has('nombre_equipo'))
                        <div class="alert alert-danger">
                            {{ $errors->first('nombre_equipo') }}
                        </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="marca" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="marca" name="marca_equipo"
                                value="{{ $equipo->marca_equipo }}" required>
                        </div>
                        @if ($errors->has('marca_equipo'))
                        <div class="alert alert-danger">
                            {{ $errors->first('marca_equipo') }}
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="modelo" class="form-label">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo_equipo"
                                value="{{ $equipo->modelo_equipo }}" required>
                        </div>
                        @if ($errors->has('modelo_equipo'))
                        <div class="alert alert-danger">
                            {{ $errors->first('modelo_equipo') }}
                        </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" class="form-control" id="color" name="color_equipo"
                                value="{{ $equipo->color_equipo }}" required>
                        </div>
                        @if ($errors->has('color_equipo'))
                        <div class="alert alert-danger">
                            {{ $errors->first('color_equipo') }}
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Estado -->
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-select" id="estado" name="estado_equipo" required>
                        <option value="0" @if ($equipo->estado_equipo == 0) selected @endif>Disponible</option>
                        <option value="1" @if ($equipo->estado_equipo == 1) selected @endif>Prestado</option>
                    </select>
                </div>
                @if ($errors->has('estado_equipo'))
                <div class="alert alert-danger">
                    {{ $errors->first('estado_equipo') }}
                </div>
                @endif

                <!-- Imagen de equipo -->
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen_equipo" accept="image/*">
                </div>
                @if ($errors->has('imagen_equipo'))
                <div class="alert alert-danger">
                    {{ $errors->first('imagen_equipo') }}
                </div>
                @endif

                <!--Datos de bitacora-->
                <input type="hidden" id="tabla" name="tabla" value="equipo">
                <input type="hidden" id="cambio" name="cambio" value="modificar">

                <!-- Botones Cancelar y Registrar -->
                <div class="mb-3">
                    <a href="{{ route('equipos.index') }}" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection