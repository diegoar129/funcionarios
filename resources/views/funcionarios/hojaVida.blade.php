@extends('plantilla')

@section('content')
<h2>Hoja de Vida {{ $funcionario->nombres }} {{ $funcionario->apellidos }}</h2>

<div class="mb-3">
    <a href="{{ route('estudios.create', $funcionario->id) }}" class="btn btn-secondary">Agregar estudio</a>
    <a href="{{ route('experiencias.create', $funcionario->id) }}" class="btn btn-secondary">Agregar experiencia</a>
    <a href="{{ route('funcionarios.index') }}" class="btn btn-outline-secondary">Volver a lista</a>
</div>

<p><strong>Documento:</strong> {{ $funcionario->documento }}</p>
<p><strong>Correo:</strong> {{ $funcionario->correo }}</p>
<p><strong>Teléfono:</strong> {{ $funcionario->telefono }}</p>
<p><strong>Cargo actual:</strong> {{ $funcionario->cargo_actual }}</p>
<p><strong>Dependencia:</strong> {{ $funcionario->dependencia }}</p>

<h3>Formación Académica</h3>
@if($funcionario->estudios->isEmpty())
    <p>No hay estudios registrados aún.</p>
@else
    <ul>
        @foreach($funcionario->estudios as $estudio)
            <li>{{ $estudio->nivel }} - {{ $estudio->titulo }} ({{ $estudio->institucion }}, {{ $estudio->fecha_graduacion }})</li>
        @endforeach
    </ul>
@endif

<h3>Experiencia Laboral</h3>
@if($funcionario->experiencias->isEmpty())
    <p>No hay experiencias registradas aún.</p>
@else
    <ul>
        @foreach($funcionario->experiencias as $exp)
            <li>{{ $exp->cargo }} en {{ $exp->empresa }} ({{ $exp->fecha_inicio }} - {{ $exp->fecha_fin ?? 'Actual' }})</li>
        @endforeach
    </ul>
@endif
@endsection
