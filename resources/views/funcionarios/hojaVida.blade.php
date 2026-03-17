@extends('plantilla')

@section('content')
<h2>Hoja de Vida {{ $funcionario->nombres }} {{ $funcionario->apellidos }}</h2>

<p><strong>Documento:</strong> {{ $funcionario->documento }}</p>
<p><strong>Correo:</strong> {{ $funcionario->correo }}</p>
<p><strong>Teléfono:</strong> {{ $funcionario->telefono }}</p>
<p><strong>Cargo actual:</strong> {{ $funcionario->cargo_actual }}</p>
<p><strong>Dependencia:</strong> {{ $funcionario->dependencia }}</p>

<h3>Formación Académica</h3>
<ul>
    @foreach($funcionario->estudios as $estudio)
        <li>{{ $estudio->nivel }} - {{ $estudio->titulo }} ({{ $estudio->institucion }}, {{ $estudio->fecha_graduacion }})</li>
    @endforeach
</ul>

<h3>Experiencia Laboral</h3>
<ul>
    @foreach($funcionario->experiencias as $exp)
        <li>{{ $exp->cargo }} en {{ $exp->empresa }} ({{ $exp->fecha_inicio }} - {{ $exp->fecha_fin ?? 'Actual' }})</li>
    @endforeach
</ul>
@endsection
