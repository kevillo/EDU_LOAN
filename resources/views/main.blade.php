@extends('layouts.app')


@section('css')

<link rel="stylesheet" href="{{asset('../resources/css/menu/menu.css')}}">
@endsection

@section('title')
<title>Inicio</title>
@endsection



@section('content')

@section('navbar')
@endsection

<div class="container mt-5">
    <!-- Primera tarjeta (orientada a la derecha) -->
    <div class=" card p-3 ">
        <div class="row ">
            <!-- imagen-->
            <div class="col-md-4 ">
                <img src="{{asset('../resources/img/prestamo.png')}}" alt="Imagen"
                    class="card-img img-fluid rounded mx-auto ">
            </div>
            <!-- texto-->
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-center">Prestamos de equipos</h5>
                    <p class="card-text ">Optimiza la gestión de préstamos de equipos con nuestra plataforma dedicada.
                        Toma decisiones informadas al revisar y aceptar, o rechazar, solicitudes de préstamo de equipos
                    </p>
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
                <img src="{{asset('../resources/img/estudiantes.png')}}" alt="Imagen"
                    class="card-img img-fluid rounded ">
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
                <img src="{{asset('../resources/img/usuarios.png')}}" alt="Imagen" class="card-img img-fluid rounded ">
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
                <img src="{{asset('../resources/img/equipos.png')}}" alt="Imagen" class="card-img img-fluid rounded ">
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
                <img src="{{asset('../resources/img/consultas.png')}}" alt="Imagen" class="card-img img-fluid rounded ">
            </div>
            <!-- texto-->
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-center ">Uso de consultas</h5>
                    <p class="card-text ">Obtén información valiosa mediante la ejecución de consultas específicas para
                        acceder a datos relevantes.</p>
                    <a href="#" class="btn btn-success goto">Ir a consultas</a>
                </div>
            </div>
            <!-- fin texto-->
        </div>
    </div>
</div>
@endif
<br><br><br><br><br>



@endsection