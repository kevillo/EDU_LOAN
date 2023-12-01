<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../resources/css/consultas/pdf.css">
    <title>Prestmos</title>
</head>

<body>
    <!--Reporte de Préstamos-->
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Reporte de Préstamos</h2>
        </div>
        <table class="table table-bordered text-center table-container">
            <thead>
                <tr>
                    <th>Equipo prestado</th>
                    <th>Usuario que lo aprobo</th>
                    <th>Estudiante</th>
                    <th>Fecha solicitud</th>
                    <th>Fecha prestamo</th>
                    <th>Fecha de devolución</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestamos as $prestamo)
                <tr>
                    @foreach ($equipos as $equipo)
                    @if ($equipo->id == $prestamo->id_equipo)
                    @foreach ($tipos as $tipo)
                    @if ($tipo->id == $equipo->id_tipo_equipo)
                    <td>{{$tipo->descripcion_tipo_equipo}}</td>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    @foreach ($users as $user)
                    @if ($user->id_user == $prestamo->id_user)
                    <td>{{$user->username}}</td>
                    @endif
                    @endforeach
                    @foreach ($estudiantes as $estudiante)
                    @if ($estudiante->id == $prestamo->id_estudiante)
                    <td>{{$estudiante->nombre_estudiante}} {{$estudiante->apellido_estudiante}}</td>
                    @endif
                    @endforeach
                    <!-- si estan vacios los campos de fecha, mostrar "No aplica" -->
                    <td>@if ($prestamo->fecha_solicitud_prestamo == null)

                        <span class="badge bg-warning">No aplica</span>
                        @else
                        {{$prestamo->fecha_solicitud_prestamo}}
                        @endif
                    </td>
                    <td>@if ($prestamo->fecha_prestamo == null)

                        <span class="badge bg-warning">No aplica</span>
                        @else
                        {{$prestamo->fecha_prestamo}}
                        @endif
                    </td>
                    <td>@if ($prestamo->fecha_devolucion == null)
                        <span class="badge bg-warning">No aplica</span>
                        @else
                        {{$prestamo->fecha_devolucion}}
                        @endif
                    </td>

                    <!-- mostrar el estado: "Pendiente", "Aprobado", "Rechazado", "Devuelto" -->
                    <td class="text-center">
                        @if ($prestamo->estado_prestamo == 'Pendiente')
                        <span class="badge bg-warning">Pendiente</span>
                        @elseif ($prestamo->estado_prestamo == 'Aprobado')
                        <span class="badge bg-success">Aprobado</span>
                        @elseif ($prestamo->estado_prestamo == 'Rechazado')
                        <span class="badge bg-danger">Rechazado</span>
                        @elseif ($prestamo->estado_prestamo == 'Devuelto')
                        <span class="badge bg-info">Devuelto</span>
                        @endif


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>