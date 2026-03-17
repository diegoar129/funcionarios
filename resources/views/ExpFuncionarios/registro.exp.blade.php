@extends('plantilla')

@section('content')
<h2>Registrar Experiencia Laboral</h2>
<form action="{{ route('experiencias.store', $funcionario->id) }}" method="POST" class="row g-3">
    @csrf
    <input type="hidden" name="funcionario_id" value="{{ $funcionario->id }}">

    <div class="col-md-6">
        <label class="form-label">Empresa</label>
        <input type="text" name="empresa" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Cargo</label>
        <input type="text" name="cargo" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Fecha inicio</label>
        <input type="date" name="fecha_inicio" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Fecha fin</label>
        <input type="date" name="fecha_fin" class="form-control">
    </div>
    <div class="col-12">
        <label class="form-label">Descripción</label>
        <textarea name="descripcion" class="form-control" rows="3"></textarea>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-success">Guardar Experiencia</button>
    </div>
</form>
@endsection
