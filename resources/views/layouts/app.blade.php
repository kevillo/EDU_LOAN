<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('../resources/css/app.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('css')
    @yield('title')


</head>

<body>
    <nav class="navbar navbar-expand-lg">
        @yield('navbar')
        <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav-links navbar-nav mt-0">
                @if (Auth::check() && Auth::user()->id_rol_user == 1)
                <li class="nav-item"><a href="{{route('usuarios.index')}}" class="nav-link">Usuarios</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Equipos</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Estudiantes</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Consultas</a></li>
                @else
                <li class="nav-item"><a href="#" class="nav-link">Préstamos</a></li>
                @endif
            </ul>
        </div>
    </nav>
    <article>
        @yield('content')
    </article>
    <footer class="text-center">
        <p>&copy; 2023 EDU LOAN. Todos los derechos reservados.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('js')
</body>

</html>