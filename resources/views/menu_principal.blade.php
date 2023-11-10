<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <link rel="stylesheet" href="../resources/css/estilo_menu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!--Menú en el lateral izquierdo-->
            <div class="col-md-3 p-0">
                <div class="menu bg-dark">
                    <h2 class="text-light">Menú Principal</h2>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="estudiantes.blade.php">Estudiantes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="prestamos.blade.php">Préstamos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="reportes.blade.php">Reportes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="equipos.blade.php">Equipos</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!--Contenido principal-->
            <div class="col-md-9">
                <h2 class="title-menu">¡Bienvenidos!</h2>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
