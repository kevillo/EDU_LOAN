<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte estudiantes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../resources/css/consultas/pdf.css">
</head>

<body>

    <h2>Reporte de Estudiantes</h2>
    <table class="text-center">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo electrónico</th>
                <th>Fecha Nacimiento</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantes as $estudiante)
            <tr>
                @foreach ($users as $user)
                @if ($user->id_user == $estudiante->id_user)
                <td>{{$user->username}}</td>
                @endif
                @endforeach

                <td>{{$estudiante->nombre_estudiante}}</td>
                <td>{{$estudiante->apellido_estudiante}}</td>
                <td>{{$estudiante->correo_estudiante}}</td>
                <td>{{$estudiante->fecha_nacimiento_estudiante}}</td>
                @foreach ($cursos as $curso)
                @if ($curso->id == $estudiante->id_curso)
                <td>{{$curso->nombre_curso}}</td>
                @endif
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>