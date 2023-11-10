<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiantes</title>
    <link rel="stylesheet" href="../resources/css/estilo_estudiantes.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Registro de Equipos</h2>
        <form id="equipoForm">
            @csrf
            <div class="row">
                <div class="col-3">
                    <img src="../resources/img/icon-equipo.png" alt="Icono de Equipos" width="100" height="100">
                </div>
                <div class="col-9">
                    <!-- ID Equipo -->
                    <div class="mb-3">
                        <label for="id_equipo" class="form-label">ID Equipo</label>
                        <input type="text" class="form-control" id="id_equipo" name="id_equipo" disabled>
                    </div>
                    <!-- Número de serie -->
                    <div class="mb-3">
                        <label for="num_serie_equipo" class="form-label">Número de serie</label>
                        <input type="text" class="form-control" placeholder="Ingrese número de serie del equipo" id="num_serie_equipo" name="num_serie_equipo" required>
                    </div>
                    <!-- ID Tipo Equipo -->
                    <div class="mb-3">
                        <label for="id_tipo_equipo" class="form-label">Tipo de equipo</label>
                        <select class="form-select" id="id_tipo_equipo" name="id_tipo_equipo" required>
                          <option value="" disabled selected>Selecciona un tipo de equipo</option>
                          <option value="1">Equipo 1</option>
                          <option value="2">Equipo 2</option>
                          <option value="3">Equipo 3</option>
                        </select>
                    </div>
                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" placeholder="Ingrese nombre del equipo" id="nombre" name="nombre" required>
                    </div>
                    <!-- Marca -->
                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control" placeholder="Ingrese marca del equipo" id="marca" name="marca" required>
                    </div>
                    <!-- Modelo -->
                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control" placeholder="Ingrese modelo del equipo" id="modelo" name="modelo" required>
                    </div>
                    <!-- Color -->
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" class="form-control" placeholder="Ingrese color del equipo" id="color" name="color" required>
                    </div>
                    <!-- Estado -->
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" id="estado" name="estado" required>
                          <option value="" disabled selected>Selecciona el estado del equipo</option>
                          <option value="1">Disponible</option>
                          <option value="2">Prestado</option>
                        </select>
                    </div>
                    <!-- Botón Cancelar -->
                    <a href="menu_principal.blade.php" class="btn btn-danger">Cancelar</a>
                    <!-- Botón Registrar -->
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
