@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/usuarios/index.css')}}">
@endsection

@section('title')
<title>crear curso</title>
@endsection

@section('content')

<div class="container">

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nombre del Rol</label>
            <input type="text" class="form-control" id="name" name="descripcion"
                placeholder="Ingrese el nombre del rol">
        </div>
        <!--Datos de bitacora-->
        <input type="hidden" id="tabla" name="tabla" value="rol_usuario">
        <input type="hidden" id="cambio" name="cambio" value="crear">
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection