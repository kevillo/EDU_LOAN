<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Usuarios</title>
    <link rel="stylesheet" href="{{asset('/css/consultas/pdf.css')}}">
</head>

<body>
    <h2>Reporte de Usuarios</h2>
    <table class="table">
        <thead class="cabecera">
            <tr>
                <th>Rol Usuario</th>
                <th>Nombre o usuario</th>
                <th>Correo electrónico</th>
                <th>Disponibilidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuario as $user)
            <tr>
                <td>{{$user->id_rol_user}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->is_available}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>