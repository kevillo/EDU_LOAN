<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" sizes="32x32" href="{{asset('/img/UNICAH_logo.ico')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/login/estilo_login.css')}}">
    <title>Login</title>
</head>

<body>
    <div class="login-box">
        <h1>Iniciar Sesión</h1>
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('usuario.login') }}" method="post">
            @csrf
            <div class="form-group">
                <label class="form-label" for="usuario">Usuario</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Usuario" required
                    autofocus>
            </div>
            <div class="form-group">
                <label class="form-label" for="contraseña">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña"
                    required>
            </div>

            <br>

            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>

    </div>
</body>

</html>