@extends('plantilla')

@section('content')
<a href="{{ route('funcionarios.create') }}" class="btn btn-primary mb-3">Registrar Funcionario</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Cargo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($funcionarios as $funcionario)
        <tr>
            <td>{{ $funcionario->documento }}</td>
            <td>{{ $funcionario->nombres }} {{ $funcionario->apellidos }}</td>
            <td>{{ $funcionario->correo }}</td>
            <td>{{ $funcionario->cargo_actual }}</td>
            <td>
                <a href="{{ route('funcionarios.show', $funcionario->id) }}" class="btn btn-info btn-sm">Ver hoja de vida</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
