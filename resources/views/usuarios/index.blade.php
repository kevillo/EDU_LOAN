@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/usuarios/index.css')}}">
@endsection


@section('content')


<div class="container mt-5">
    <div class="d-flex flex-column flex-md-row justify-content-between">
        <h2 class="mb-3 mb-md-0">Usuarios</h2>
        <a href="{{ route('usuarios.create') }}" class="btn btn-success add">Agregar usuario</a>
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

<main class="container mt-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @if(count($usuarios) > 0)
        @foreach ($usuarios as $usuario)
        <section>
            <!--inicio de card -->
            <div class="card custom-card ">
                @if ($usuario->imagen)
                <img style="max-height: 200px; width: auto; object-fit: cover; height: 100%;"
                    src="{{ asset('storage/' . $usuario->imagen) }}" class="card-img-top" alt="Banner de Publicación">
                @endif
                <div class="card-body custom-card-body">
                    <h5 class="card-title custom-card-title">{{ $usuario->username }}</h5>
                    <p class="card-text custom-card-text">{{ $usuario->email }}</p>
                    <div class="custom-btn-container ">
                        <div class="d-flex">
                            <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                class="btn btn-success custom-btn edit">Editar</a>
                            <!-- Button trigger modal -->
                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" class="form-delete"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger custom-btn delete">Eliminar</button>
                            </form>
                        </div>
                        <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-primary custom-btn show">Ver
                            detalles</a>
                    </div>
                </div>
            </div>
            <!--fin de card -->
        </section>
        @endforeach

        @else
        <p class="no-usuario-message">No hay ningún usuario.</p>
        @endif
    </div>
</main>

@section('js')
<script src="{{asset('../resources/js/usuarios/index.js')}}"></script>
<script src="{{asset('../resources/js/delete.js')}} "></script>

@endsection

@endsection