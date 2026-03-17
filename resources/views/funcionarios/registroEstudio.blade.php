@extends('plantilla')

@section('content')
<h2>Agregar Estudio</h2>

<form action="{{ route('estudios.store', $funcionarioId) }}" method="POST" class="row g-3">
    @csrf
    <div class="col-md-6">
        <label class="form-label">Nivel</label>
        <input type="text" name="nivel" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Título</label>
        <input type="text" name="titulo" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Institución</label>
        <input type="text" name="institucion" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Fecha de graduación</label>
        <input type="date" name="fecha_graduacion" class="form-control" required>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('funcionarios.show', $funcionarioId) }}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
@endsection
