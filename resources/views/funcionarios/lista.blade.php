@extends('plantilla')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3 mb-3">
    <a href="{{ route('funcionarios.create') }}" class="btn btn-primary">Registrar Funcionario</a>

    <form method="GET" action="{{ route('funcionarios.index') }}" class="d-flex gap-2">
        <input
            type="search"
            name="q"
            value="{{ request('q') }}"
            class="form-control"
            placeholder="Buscar documento o nombre"
            aria-label="Buscar funcionarios"
        >
        <button type="submit" class="btn btn-outline-secondary">Buscar</button>
    </form>
</div>

@if($funcionarios->isEmpty())
    <div class="alert alert-info">
        No hay funcionarios registrados aún. Usa el botón de arriba para agregar el primero.
    </div>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Cargo</th>
                <th>Último estudio</th>
                <th>Graduado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($funcionarios as $funcionario)
            @php
                $ultimoEstudio = $funcionario->estudios->sortByDesc('fecha_graduacion')->first();
                $graduadoDiff = $ultimoEstudio
                    ? \Carbon\Carbon::parse($ultimoEstudio->fecha_graduacion)->diff(now())
                    : null;
            @endphp
            <tr>
                <td>{{ $funcionario->documento }}</td>
                <td>{{ $funcionario->nombres }} {{ $funcionario->apellidos }}</td>
                <td>{{ $funcionario->correo }}</td>
                <td>{{ $funcionario->cargo_actual }}</td>
                <td>
                    @if($ultimoEstudio)
                        {{ $ultimoEstudio->nivel }} - {{ $ultimoEstudio->titulo }}
                    @else
                        <em>Sin estudios</em>
                    @endif
                </td>
                <td>
                    @if($graduadoDiff)
                        @if($graduadoDiff->y > 0)
                            {{ $graduadoDiff->y }} {{ $graduadoDiff->y === 1 ? 'año' : 'años' }}
                        @endif
                        @if($graduadoDiff->m > 0)
                            {{ $graduadoDiff->m }} {{ $graduadoDiff->m === 1 ? 'mes' : 'meses' }}
                        @endif
                        @if($graduadoDiff->y === 0 && $graduadoDiff->m === 0)
                            Reciente
                        @endif
                    @else
                        -
                    @endif
                </td>
                <td>
                    <a href="{{ route('funcionarios.show', $funcionario->id) }}" class="btn btn-info btn-sm">Ver hoja de vida</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $funcionarios->links() }}
@endif
@endsection
