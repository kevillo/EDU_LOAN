<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="../resources/css/estilo_estudiantes.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Registro de Usuarios</h2>
        <form id="estudianteForm">
            @csrf
            <div class="row">
                <div class="col-3">
                    <img src="../resources/img/icon-usuario.png" alt="Icono de Usuario" width="100" height="100">
                </div>
                <div class="col-9">
                    <!-- ID Usuario -->
                    <div class="mb-3">
                        <label for="id_usuario" class="form-label">ID Usuario</label>
                        <input type="text" class="form-control" id="id_usuario" name="id_usuario" disabled>
                    </div>
                    <!-- ID Rol Usuario -->
                    <div class="mb-3">
                        <label for="id_rol_user" class="form-label">Rol Usuario</label>
                        <select class="form-select" id="id_rol_user" name="id_rol_user" required>
                          <option value="" disabled selected>Selecciona un rol de usuario</option>
                          <option value="1">Usuario 1</option>
                          <option value="2">Usuario 2</option>
                          <option value="3">Usuario 3</option>
                        </select>
                    </div>
                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre o Usuario</label>
                        <input type="text" class="form-control" placeholder="Ingrese nombre" id="nombre" name="nombre" required>
                    </div>
                    <!-- Contraseña -->
                    <div class="mb-3">
                        <label for="contraseña" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" placeholder="Ingrese contraseña" id="contraseña" name="contraseña" required>
                    </div>
                     <!-- Disponibilidad -->
                     <div class="mb-3">
                        <label for="disponibilidad" class="form-label">Disponibilidad</label>
                        <select class="form-select" id="disponibilidad" name="id_rol_disponibilidad" required>
                          <option value="" disabled selected>Seleccione la disponibilidad</option>
                          <option value="1">Activo</option>
                          <option value="2">Inactivo</option>
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
