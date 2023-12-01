<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Usuarios</title>
    <link rel="stylesheet" href="../resources/css/consultas/pdf.css">
</head>

<body>
    <h2>Reporte de Equipos</h2>
    <div class="container">
        <table class="text-center ">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Número de serie</th>
                    <th>color</th>
                    <th>Imagen</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipos as $equipo)
                <tr>
                    <td>{{$equipo->nombre_equipo}}</td>
                    @foreach ($tipos as $tipo)
                    @if ($tipo->id == $equipo->id_tipo_equipo)
                    <td>{{$tipo->descripcion_tipo_equipo}}</td>
                    @endif
                    @endforeach

                    <td>{{$equipo->marca_equipo}}</td>
                    <td>{{$equipo->modelo_equipo}}</td>
                    <td>{{$equipo->numero_serie}}</td>
                    <td>{{$equipo->color_equipo}}</td>
                    <td><img src="{{asset('storage').'/'.$equipo->imagen_equipo}}" alt="Imagen del equipo" width="100">
                    </td>
                    <!-- mostrar el estado con palabras 0: disponible, 1: prestado, 2: en espera -->
                    <td class="text-center">
                        @if ($equipo->estado_equipo == 0)
                        <span class="badge bg-success">Disponible</span>
                        @elseif ($equipo->estado_equipo == 1)
                        <span class="badge bg-warning">Prestado</span>
                        @elseif ($equipo->estado_equipo == 2)
                        <span class="badge bg-danger">En espera</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</html>