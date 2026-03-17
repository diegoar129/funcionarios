@extends('plantilla')

@section('content')
<h2>Editar Funcionario</h2>

<form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST" class="row g-3">
    @csrf
    @method('PUT')

    <div class="col-md-6">
        <label class="form-label">Documento</label>
        <input type="text" name="documento" class="form-control" value="{{ old('documento', $funcionario->documento) }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Nombres</label>
        <input type="text" name="nombres" class="form-control" value="{{ old('nombres', $funcionario->nombres) }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Apellidos</label>
        <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos', $funcionario->apellidos) }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Correo</label>
        <input type="email" name="correo" class="form-control" value="{{ old('correo', $funcionario->correo) }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Teléfono</label>
        <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $funcionario->telefono) }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $funcionario->fecha_nacimiento) }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Cargo actual</label>
        <input type="text" name="cargo_actual" class="form-control" value="{{ old('cargo_actual', $funcionario->cargo_actual) }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Dependencia</label>
        <input type="text" name="dependencia" class="form-control" value="{{ old('dependencia', $funcionario->dependencia) }}" required>
    </div>

    <div class="col-12 d-flex gap-2">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('funcionarios.show', $funcionario->id) }}" class="btn btn-outline-secondary">Cancelar</a>
    </div>
</form>
@endsection
