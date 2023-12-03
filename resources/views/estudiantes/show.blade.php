@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/estudiantes/create.css') }}">
@endsection

@section('title')
<title>Detalles del Estudiante</title>
@endsection

@section('content')
<div class="container mt-5 rounded shadow w-50">
    <div class="row">
        <div class="col-md-6">

            @if($estudiante->imagen_estudiante)
            <img src="{{ asset('storage/' . $estudiante->imagen_estudiante) }}" alt="Imagen del Estudiante"
                class="card-img img-fluid  rounded  p-3">
            @else
            <p>No hay imagen disponible</p>
            @endif
        </div>
        <div class="col-md-6  d-flex flex-column justify-content-center   align-items-sm-center ">
            <h2 class="p-3">Detalles del Estudiante</h2>
            <p><strong>Usuario asignado:</strong> {{ $usuarios->username }}</p>
            <p><strong>Nombre:</strong> {{ $estudiante->nombre_estudiante }}</p>
            <p><strong>Apellido:</strong> {{ $estudiante->apellido_estudiante }}</p>
            <p><strong>Correo Electrónico:</strong> {{ $estudiante->correo_estudiante }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $estudiante->fecha_nacimiento_estudiante }}</p>
            <p><strong>Curso:</strong> {{ $cursos->nombre_curso }}</p>


            <div class="p-2">
                <a href="{{ route('estudiantes.index') }}" class="btn btn-danger">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection