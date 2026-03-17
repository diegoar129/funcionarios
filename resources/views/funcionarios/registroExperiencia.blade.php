@extends('plantilla')

@section('content')
<h2>Agregar Experiencia</h2>

<form action="{{ route('experiencias.store', $funcionarioId) }}" method="POST" class="row g-3">
    @csrf
    <div class="col-md-6">
        <label class="form-label">Empresa</label>
        <input type="text" name="empresa" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Cargo</label>
        <input type="text" name="cargo" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Fecha de inicio</label>
        <input type="date" name="fecha_inicio" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Fecha fin (opcional)</label>
        <input type="date" name="fecha_fin" class="form-control">
    </div>
    <div class="col-12">
        <label class="form-label">Descripción (opcional)</label>
        <textarea name="descripcion" class="form-control" rows="3"></textarea>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('funcionarios.show', $funcionarioId) }}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
@endsection
