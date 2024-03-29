<!-- contenido para crear el curso -->

@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('/css/usuarios/index.css')}}">
@endsection

@section('title')
<title>crear curso</title>
@endsection

@section('content')

<!-- contenido para crear el curso -->
<div class="container">
    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf


        <div class="form-group">
            <label for="nombre_curso">Nombre del curso:</label>
            <input type="text" name="nombre_curso" id="nombre_curso" class="form-control"></input>
        </div>
        <br>
        <!--Datos de bitacora-->
        <input type="hidden" id="tabla" name="tabla" value="curso">
        <input type="hidden" id="cambio" name="cambio" value="crear">



        <button type="submit" class="btn btn-primary">Guardar curso</button>
    </form>
</div>
@endsection