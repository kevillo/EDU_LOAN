@extends('layouts.app')


@section('css')

<link rel="stylesheet" href="{{asset('/css/menu/menu.css')}}">
@endsection

@section('title')
<title>Inicio</title>
@endsection





@section('content')

<!-- alertas -->
@if(session('Actualizado'))
<div class="alert alert-success custom-alert" role="alert">
    <strong>¡Actualizado!</strong> {{ session('Actualizado') }}
</div>
@endif

@if(session('Creado'))
<div class="alert alert-success custom-alert" role="alert">
    <strong>¡Creado!</strong> {{ session('Creado') }}
</div>
@endif


<div class="container mt-5">
    <!-- Primera tarjeta (orientada a la derecha) -->
    <div class=" card p-3 ">
        <div class="row ">
            <!-- imagen-->
            <div class="col-md-4 ">
                <img src="{{asset('/img/prestamo.png')}}" alt="Imagen" class="card-img img-fluid rounded mx-auto ">
            </div>
            <!-- texto-->
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-center">Prestamos de equipos</h5>
                    @if (Auth::check() && Auth::user()->id_rol_user == 1)
                    <p class="card-text ">Optimiza la gestión de préstamos de equipos con nuestra plataforma dedicada.
                        Toma decisiones informadas al revisar y aceptar, o rechazar, solicitudes de préstamo de equipos
                    </p>
                    @else
                    <p class="card-text ">Solicita préstamos de equipos con nuestra plataforma dedicada. Toma
                        consulta el estado de tus solicitudes.</p>
                    @endif
                    <a href="{{route('prestamos.index')}}" class="btn btn-success goto">Ir a prestamos </a>
                </div>
            </div>
            <!-- fin texto-->
        </div>
    </div>
</div>

@if (Auth::check() && Auth::user()->id_rol_user == 1)

<div class="container mt-5">
    <!-- Primera tarjeta (orientada a la derecha) -->
    <div class=" card p-3 left ">
        <div class="row ">


            <!-- texto-->
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-center">Gestion de estudiantes</h5>
                    <p class="card-text ">Facilita la gestión de estudiantes con nuestra plataforma eficiente. Agrega,
                        actualiza y elimina perfiles con facilidad, manteniendo un control total sobre la información
                        académica y personal.</p>
                    <a href="{{ route('estudiantes.index') }}" class="btn btn-success goto">Ir a estudiantes </a>
                </div>
            </div>
            <!-- fin texto-->
            <!-- imagen-->
            <div class="col-md-4">
                <img src="{{asset('/img/estudiantes.png')}}" alt="Imagen" class="card-img img-fluid rounded ">
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <!-- Primera tarjeta (orientada a la derecha) -->
    <div class=" card p-3 ">
        <div class="row ">
            <!-- imagen-->
            <div class="col-md-4 ">
                <img src="{{asset('/img/usuarios.png')}}" alt="Imagen" class="card-img img-fluid rounded ">
            </div>
            <!-- texto-->
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-center ">Gestion de usuarios</h5>
                    <p class="card-text ">Optimiza la administración de usuarios con nuestra plataforma
                        eficiente. Añade, actualiza y elimina perfiles con facilidad, manteniendo un control total sobre
                        la información.</p>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-success goto">Ir a usuarios </a>
                </div>
            </div>
            <!-- fin texto-->
        </div>
    </div>
</div>

<div class="container mt-5">
    <!-- Primera tarjeta (orientada a la derecha) -->
    <div class=" card p-3 left ">
        <div class="row ">


            <!-- texto-->
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-center">Manejo de equipos</h5>
                    <p class="card-text ">Potencia tu gestión de equipos con nuestra plataforma integral. Añade,
                        modifica y elimina detalles de equipos de manera eficaz para mantener tu inventario siempre
                        actualizado.</p>
                    <a href="{{ route('equipos.index') }}" class="btn btn-success goto">Ir a equipos</a>
                </div>
            </div>
            <!-- fin texto-->
            <!-- imagen-->
            <div class="col-md-4 ">
                <img src="{{asset('/img/equipos.png')}}" alt="Imagen" class="card-img img-fluid rounded ">
            </div>
        </div>
    </div>
</div>


<div class="container mt-5">
    <!-- Primera tarjeta (orientada a la derecha) -->
    <div class=" card p-3 ">
        <div class="row ">

            <!-- imagen-->
            <div class="col-md-4 ">
                <img src="{{asset('/img/consultas.png')}}" alt="Imagen" class="card-img img-fluid rounded ">
            </div>
            <!-- texto-->
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-center ">Uso de consultas</h5>
                    <p class="card-text ">Obtén información valiosa mediante la ejecución de consultas específicas para
                        acceder a datos relevantes.</p>
                    <a href="{{route('consultas.index')}}" class="btn btn-success goto">Ir a consultas</a>
                </div>
            </div>
            <!-- fin texto-->
        </div>
    </div>
</div>
@endif
<br><br><br><br><br>

@section('js')
<script src="{{asset('/js/usuarios/index.js')}}"></script>
<script src="{{asset('/js/delete.js')}} "></script>
@endsection


@endsection