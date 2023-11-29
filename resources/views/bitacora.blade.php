<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitacora de uso</title>
    <link rel="stylesheet" href="../resources/css/estilo_estudiantes.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>


    <main class="container mt-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            @if(count($bitacora) > 0)
            @foreach ($bitacora as $bitacora)
            <section>
                <!--inicio de card -->
                <div class="card custom-card ">
                    <div class="card-body custom-card-body">
                        <p class="card-title custom-card-title">{{ $bitacora->username_bit }}</h5>
                        <p class="card-text custom-card-text">{{ $bitacora->cambio }}</p>
                        <p class="card-text custom-card-text">{{ $bitacora->tabla }}</p>
                    </div>
                </div>
                <!--fin de card -->
            </section>
    
            @endforeach
    

        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
