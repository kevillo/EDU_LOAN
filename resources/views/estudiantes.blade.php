<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiantes</title>
    <link rel="stylesheet" href="css/estilo_estudiantes.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Registro de Estudiantes</h2>
        <form id="estudianteForm">
            <div class="row">
                <div class="col-3">
                    <img src="img/icon-estudiante.svg" alt="Icono de Estudiante" width="100" height="100">
                </div>
                <div class="col-9">
                    <!-- ID Estudiante -->
                    <div class="mb-3">
                        <label for="id_estudiante" class="form-label">ID Estudiante</label>
                        <input type="text" class="form-control" id="id_estudiante" name="id_estudiante" disabled>
                    </div>
                    <!-- ID Curso -->
                    <div class="mb-3">
                        <label for="id_curso" class="form-label">ID Curso</label>
                        <select class="form-select" id="id_curso" name="id_curso" required>
                          <option value="" disabled selected>Selecciona un curso</option>
                          <option value="1">Curso 1</option>
                          <option value="2">Curso 2</option>
                          <option value="3">Curso 3</option>
                        </select>
                    </div>
                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" placeholder="Ingrese nombre" id="nombre" name="nombre" required>
                    </div>
                    <!-- Apellido -->
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" placeholder="Ingrese apellido" id="apellido" name "apellido" required>
                    </div>
                    <!-- Correo -->
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" placeholder="Ingrese correo electrónico" id="correo" name="correo" required>
                    </div>
                    <!-- Fecha Nacimiento -->
                    <div class="mb-3">
                        <label for="fechaNacimiento" class="form-label">Fecha Nacimiento</label>
                        <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
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
