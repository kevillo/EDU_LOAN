<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css\estilo_login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="login-box">
        <h1>Iniciar Sesión</h1>
        <form method="POST" action="{{ route('login') }}">
            <div class="form-group">
                <label class="form-label" for="usuario">Usuario</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Correo Electrónico" required autofocus>
            </div>
            <div class="form-group">
                <label class="form-label" for="contraseña">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
            </div>

            <br>

            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
        <div class="mt-3">
            <a href="{{ route('password.request') }}">¿Olvidaste la contraseña?</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
