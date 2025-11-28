@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Camionero</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $camionero->nombre }} {{ $camionero->apellido }}</h5>
            <p><strong>Documento:</strong> {{ $camionero->documento }}</p>
            <p><strong>Fecha Nacimiento:</strong> {{ $camionero->fecha_nacimiento }}</p>
            <p><strong>Licencia:</strong> {{ $camionero->licencia }}</p>
            <p><strong>Teléfono:</strong> {{ $camionero->telefono }}</p>
        </div>
    </div>
    
    <div class="mt-3">
        <a href="{{ route('camioneros.edit', $camionero->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('camioneros.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection
