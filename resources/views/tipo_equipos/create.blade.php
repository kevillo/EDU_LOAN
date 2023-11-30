@extends('layouts.app')


@section('title')
<title>Registro de los tipos de equipo</title>
@endsection

@section('content')
<div class="container mt-">
    <form action="{{ route('tipo_equipos.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="descripcion_tipo_equipo">Tipo de equipo</label>
            <input type="text" class="form-control" id="descripcion_tipo_equipo" name="descripcion_tipo_equipo"
                placeholder="Ingrese el tipo de equipo">
        </div>
        <br>
        <!--Datos de bitacora-->
        <input type="hidden" id="tabla" name="tabla" value="tipo_equipos">
        <input type="hidden" id="cambio" name="cambio" value="crear">

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection