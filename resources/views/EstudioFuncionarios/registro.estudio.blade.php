@extends('plantilla')

@section('content')
<h2>Registrar Funcionario</h2>
<form action="{{ route('funcionarios.store') }}" method="POST" class="row g-3">
    @csrf
    <div class="col-md-6">
        <label class="form-label">Documento</label>
        <input type="text" name="documento" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Nombres</label>
        <input type="text" name="nombres" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Apellidos</label>
        <input type="text" name="apellidos" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Correo</label>
        <input type="email" name="correo" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Teléfono</label>
        <input type="text" name="telefono" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Cargo actual</label>
        <input type="text" name="cargo_actual" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Dependencia</label>
        <input type="text" name="dependencia" class="form-control" required>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</form>
@endsection
