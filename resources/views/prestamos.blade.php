<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Préstamos</title>
    <link rel="stylesheet" href="../resources/css/estilo_prestamos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Registro de Préstamos</h2>
        <!-- Tabla info equipos dispo -->
        <h3 style="text-align: left; padding: 15px">Información de Equipos Disponibles</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Número de serie</th>
                    <th>ID Tipo Equipo</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Color</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <!-- Agrega filas con información de equipos disponibles aquí -->
            </tbody>
        </table>

        <br><br>

        <!-- Tabla solicitud préstamos -->
        <h3 style="text-align: left; padding: 15px">Solicitud de préstamos</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Préstamo</th>
                    <th>Equipo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" class="form-control" id="id_prestamo" name="id_prestamo" disabled></td>
                    <td>
                        <select class="form-select" id="equipo" name="equipo" required>
                            <option value="" disabled selected>Selecciona un equipo</option>
                            <option value="Equipo 1">Equipo 1</option>
                            <option value="Equipo 2">Equipo 2</option>
                            <option value="Equipo 3">Equipo 3</option>
                        </select>
                    </td>
                </tr>
                <!-- A través de código hacer que aumenten las filas  -->
            </tbody>
        </table>  

        <!-- Botón Cancelar -->
        <a href="menu_principal.blade.php" class="btn btn-danger float-start" style="margin-right: 10px;">Cancelar</a>
        <!-- Botón Registrar -->
        <button type="submit" class="btn btn-primary float-start">Solicitar Préstamo</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
