@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/consultas/consulta.css')}}">
@endsection

@section('title')
<title>Reportes</title>
@endsection


@section('content')
<h2 class="text-center">Reportes</h2>
<div class="container ">
    <div class="row ">
        <div class=" col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <img src="{{asset('../resources/img/usuarios.png')}}" class="img img-fluid"
                    style="max-width:200px; object-fit:cover; margin:0 auto;" alt="Estudiantes">
                <div class="card-body">
                    <h5 class="card-title">Reporte de Usuarios</h5>
                    <p class="card-text">Accede al reporte de usuarios para obtener información detallada.</p>
                    <a href="{{route('consultas.usuarios_index')}}" class="btn btn-primary">Ir al
                        reporte</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <img src="{{asset('../resources/img/estudiantes.png')}}" class="img img-fluid"
                    style="max-width:200px; object-fit:cover; margin:0 auto;" alt="Estudiantes">
                <div class="card-body">
                    <h5 class="card-title">Reporte de Estudiantes</h5>
                    <p class="card-text">Accede al reporte de estudiantes para obtener información detallada.
                    </p>
                    <a href="{{route('consultas.estudiantes_index')}}" class="btn btn-primary">Ir al reporte</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <img src="{{asset('../resources/img/equipos.png')}}" class="img img-fluid"
                    style="max-width:200px; object-fit:cover; margin:0 auto;" alt="Equipos">
                <div class="card-body">
                    <h5 class="card-title">Reporte de Equipos</h5>
                    <p class="card-text">Accede al reporte de equipos para obtener información detallada.</p>
                    <a href="{{route('consultas.equipos_index')}}" class="btn btn-primary">Ir al reporte</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <img src="{{asset('../resources/img/prestamo.png')}}" class="img img-fluid"
                    style="max-width:200px; object-fit:cover; margin:0 auto;" alt="Estudiantes">
                <div class="card-body">
                    <h5 class="card-title">Reporte de prestamos</h5>
                    <p class="card-text">Accede al reporte de los prestamos para obtener información detallada.
                    </p>
                    <a href="{{route('consultas.prestamos_index')}}" class="btn btn-primary">Ir al reporte</a>
                </div>
            </div>
        </div>



        <!-- Repite estas tarjetas según sea necesario para cumplir con la disposición deseada -->

    </div>
</div>

@endsection