<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Préstamos</title>
    <link rel="stylesheet" href="../resources/css/estilo_prestamos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Consulta de prestamos</h2>
        <h3 style="text-align: left; padding: 15px">Prestamos pendientes</h3>

        <!-- Tabla que  -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    @if (Auth::user()->id_rol_user == 1)
                    <th class=" w-10 ">Estudiante a quien se le prestara el equipo</th>
                    @endif
                    <th>Equipo</th>
                    <th>Fecha de devolución estimada</th>
                    <th>Fecha de solicitud</th>
                    <th>Estado de préstamo</th>
                    @if (Auth::user()->id_rol_user == 1)
                    <th>Acciones</th>
                    @endif


                </tr>
            </thead>
            <tbody>
                @foreach ($prestamos as $prestamo)
                <tr>
                    @if (Auth::user()->id_rol_user == 1)
                    <td>{{$estudiantes->nombre_estudiante}}</td>
                    @endif

                    @foreach ($equipos as $equipo)
                    @if ($prestamo->id_equipo == $equipo->id)
                    <td>{{$equipo->nombre_equipo}}</td>
                    @endif
                    @endforeach
                    <td>{{$prestamo->fecha_devolucion_estimada}}</td>
                    <td>{{$prestamo->fecha_solictud}}</td>
                    <td>{{$prestamo->estado_prestamo}}</td>
                    @if (Auth::user()->id_rol_user == 1)
                    <td>
                        <!-- esto es para que el administrador pueda aceptar o rechazar la solicitud de prestamo -->
                        <form action="{{route('prestamo.update',$prestamo->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            @if ($prestamo->estado_prestamo == 'Aceptado')

                            <button type="submit" class="btn btn-success" name="accion_devolver"
                                value="devolver">Devolver</button>
                            @else
                            <button type="submit" class="btn btn-success" name="accion_accept"
                                value="aceptar">Aceptar</button>
                            <button type="submit" class="btn btn-danger" name="accion_delete"
                                value="rechazar">Rechazar</button>
                            @endif

                        </form>
                    </td>

                    @endif


                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('usuarios.main') }}" class="btn btn-primary">Regresar</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>