<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Gestión - Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-5">Bienvenido al Sistema de Gestión</h1>
            <p class="lead">Selecciona una sección para comenzar.</p>
        </div>

        <div class="row justify-content-center g-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Funcionarios</h5>
                        <p class="card-text flex-grow-1">Ver, registrar y administrar funcionarios públicos.</p>
                        <a href="{{ route('funcionarios.index') }}" class="btn btn-primary mt-3">Ir a Funcionarios</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Crear funcionario</h5>
                        <p class="card-text flex-grow-1">Agrega un nuevo funcionario al sistema.</p>
                        <a href="{{ route('funcionarios.create') }}" class="btn btn-secondary mt-3">Registrar funcionario</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Inicio</h5>
                        <p class="card-text flex-grow-1">Regresa a esta pantalla principal en cualquier momento.</p>
                        <a href="{{ url('/') }}" class="btn btn-outline-primary mt-3">Ir al inicio</a>
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center mt-5">
            <p class="text-muted mb-0">&copy; {{ date('Y') }} Sistema de Gestión</p>
        </footer>
    </div>
</body>
</html>
