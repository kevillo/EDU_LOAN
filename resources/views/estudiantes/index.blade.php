@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('/css/usuarios/index.css')}}">
@endsection

@section('title')
<title>Usuarios</title>
@endsection

@section('content')


<div class="container mt-5">
    <div class="d-flex flex-column flex-md-row justify-content-between">
        <h2 class="mb-3 mb-md-0">Estudiantes</h2>
        <a href="{{ route('estudiantes.create') }}" class="btn btn-success add">Agregar estudiante</a>
    </div>
</div>


<!-- alertas -->
@if(session('Eliminado'))
<div class="container mt-3">
    <div class="row justify-content-end">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="alert alert-success custom-alert" role="alert">
                <strong>¡Eliminado!</strong> {{ session('Eliminado') }}
            </div>
        </div>
    </div>
</div>
@endif




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


<!-- fin alertas -->

<!-- inicio de buscador -->

<div class="container mt-5">
    <form method="post" action="{{ route('buscar.estudiantes') }}">
        @csrf
        <input type="text" name="nombre" class="form-control" placeholder="Ingrese su búsqueda por nombre de usuarios"
            aria-label="Ingrese su búsqueda" aria-describedby="button-addon2">
        <div class="input-group-append">
            <br>
            <button class="btn btn-outline-primary mr-4" type="submit" id="button-addon2">Buscar</button>
            <a href="{{ route('estudiantes.index') }}" class="btn btn-outline-primary" type="submit"
                id="button-addon2">Cancelar</a>
        </div>
    </form>
</div>
<!-- fin de buscador -->
<main class="container mt-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @if(count($estudiantes) > 0)
        @foreach ($estudiantes as $estudiante)
        <section>
            <!--inicio de card -->
            <div class="card custom-card ">
                @if ($estudiante->imagen_estudiante)
                <img style="max-height: 200px; width: auto; object-fit: cover; height: 100%;"
                    src="{{ asset('storage/' . $estudiante->imagen_estudiante) }}" class="card-img-top"
                    alt="Banner de Publicación">
                @endif
                <div class="card-body custom-card-body">
                    <h5 class="card-title custom-card-title">{{ $estudiante->nombre_estudiante }}</h5>
                    <p class="card-text custom-card-text">{{ $estudiante->correo_estudiante }}</p>
                    <div class="custom-btn-container ">
                        <div class="d-flex">
                            <a href="{{ route('estudiantes.edit', $estudiante->id) }}"
                                class="btn btn-success custom-btn edit">Editar</a>
                            <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST"
                                class="form-delete form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger custom-btn delete ">Eliminar</button>
                            </form>

                        </div>
                        <a href="{{ route('estudiantes.show', $estudiante->id) }}"
                            class="btn btn-primary custom-btn show">Ver
                            detalles</a>
                    </div>
                </div>
            </div>
            <!--fin de card -->
        </section>



        @endforeach


        @else
        <p class="no-usuario-message">No hay ningún Estudiante.</p>
        @endif
    </div>
</main>
<br><br><br><br><br><br>
@section('js')
<script src="{{asset('/js/usuarios/index.js')}}"></script>
<script src="{{asset('/js/delete.js')}} "></script>
@endsection

@endsection