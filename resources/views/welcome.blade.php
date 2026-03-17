@extends('plantilla')

@section('content')
<div class="bg-light p-4 rounded shadow-sm">
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
                    <h5 class="card-title">Buscar funcionario</h5>
                    <p class="card-text">Busca por documento, nombre o apellido.</p>
                    <form method="GET" action="{{ route('funcionarios.index') }}" class="mt-2">
                        <div class="mb-2">
                            <input
                                type="search"
                                name="q"
                                class="form-control"
                                placeholder="Ej: 123456 o Juan Pérez"
                                aria-label="Buscar funcionario"
                                required
                            >
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5">
        <p class="text-muted mb-0">&copy; {{ date('Y') }} Sistema de Gestión</p>
    </footer>
</div>
@endsection
