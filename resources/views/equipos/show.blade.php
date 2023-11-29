@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/estudiantes/details.css') }}">
@endsection

@section('title')
<title>Detalles del Estudiante</title>
@endsection

@section('content')
<div class="container mt-5 rounded shadow w-50">
    <div class="row">
        <div class="col-md-6">

            @if ($equipo->imagen_equipo)
            <img src="{{ asset('storage/' . $equipo->imagen_equipo) }}" alt="Imagen del Equipo"
                class="card-img img-fluid  rounded mt-5 p-3">
            @else
            <p>No hay imagen disponible</p>
            @endif
        </div>
        <div class="col-md-6  d-flex flex-column justify-content-center   align-items-sm-center ">
            <h2 class="p-3">Detalles del Equipo</h2>
            <p><strong>Número de serie:</strong> {{ $equipo->numero_serie }}</p>
            <p><strong>Tipo de equipo:</strong> {{ $tipo_equipo->descripcion_tipo_equipo }}</p>
            <p><strong>Nombre:</strong> {{ $equipo->nombre_equipo }}</p>
            <p><strong>Marca:</strong> {{ $equipo->marca_equipo }}</p>
            <p><strong>Modelo:</strong> {{ $equipo->modelo_equipo }}</p>
            <p><strong>Color:</strong> {{ $equipo->color_equipo }}</p>
            <p><strong>Estado:</strong>
                @if ($equipo->estado_equipo == 0)
                Disponible
                @elseif ($equipo->estado_equipo == 1)
                Prestado
                @endif
            </p>

            <div class=" p-2  ">
                <a href="{{ route('equipos.index') }}" class="btn btn-danger">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection