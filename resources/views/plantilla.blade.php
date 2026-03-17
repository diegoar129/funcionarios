<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-3" style="position: relative; padding-top: 90px;">
    <div style="position: fixed; top: 0; left: 0; right: 0; height: 90px; background: #7b1b2b; z-index: 850;"></div>

    <header class="d-flex align-items-center justify-content-center" style="position: fixed; top: 0; left: 0; right: 0; height: 70px; z-index: 900; padding: 0 90px;">
        <a href="{{ url('/') }}" style="display: flex; align-items: center; justify-content: center; height: 100%; margin-right: 16px;">
            <img src="{{ asset('images/escudo.png') }}" alt="Escudo" style="height: 5.3em; width: auto; display: block;" />
        </a>
        <h1 class="mb-0 text-center" style="color: #fff; font-size: 1.3rem;">Gestión de Funcionarios Públicos</h1>
    </header>

    <div class="mt-4">

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    @yield('content')
    </div>
</body>
</html>
