<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bs-primary: #7b1b2b;
            --bs-primary-rgb: 123, 27, 43;
            --bs-secondary: #7b1b2b;
            --bs-secondary-rgb: 123, 27, 43;
        }

        /* Asegura que todos los botones primarios usen vino rojo */
        .btn-primary {
            background-color: #7b1b2b !important;
            border-color: #7b1b2b !important;
        }
        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #5b1421 !important;
            border-color: #5b1421 !important;
        }

        .app-topbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 90px;
            background: #7b1b2b;
            z-index: 850;
        }

        .app-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 90px;
            z-index: 900;
            padding: 0 20px;
        }

        .app-logo {
            height: 3rem;
            width: auto;
            display: block;
        }

        .app-title {
            font-size: 1.35rem;
        }

        @media (max-width: 768px) {
            body {
                padding-top: 120px !important;
            }

            .app-topbar,
            .app-header {
                height: 110px;
            }

            .app-header {
                padding: 8px 12px;
                align-items: flex-start !important;
                flex-direction: column;
                gap: 8px;
            }

            .app-header-right {
                width: 100%;
                display: flex;
                justify-content: flex-end;
                flex-wrap: wrap;
                gap: 6px;
            }

            .app-logo {
                height: 2.2rem;
            }

            .app-title {
                font-size: 1.05rem;
            }
        }
    </style>
</head>
<body class="container mt-3" style="position: relative; padding-top: 90px;">
    <div class="app-topbar"></div>

    <header class="app-header d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ url('/') }}" style="display: flex; align-items: center; justify-content: center;">
                <img src="{{ asset('images/escudo.png') }}" alt="Escudo" class="app-logo" />
            </a>
            <h1 class="app-title mb-0 text-white">Gestión de Funcionarios Públicos</h1>
        </div>

        <div class="app-header-right">
            @if(session('user'))
                <span class="text-white me-2">Hola, {{ session('user') }}</span>
                @if(session('is_admin'))
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-light btn-sm me-2">Administrar usuarios</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="m-0 d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Cerrar sesión</button>
                </form>
            @else
                <a href="{{ route('login.funcionario') }}" class="btn btn-outline-light btn-sm me-2">Login funcionario</a>
                <a href="{{ route('login.admin') }}" class="btn btn-outline-light btn-sm me-2">Login admin</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Registrarse</a>
            @endif
        </div>
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
