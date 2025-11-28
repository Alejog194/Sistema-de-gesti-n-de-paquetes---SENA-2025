@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Camión</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $camion->modelo }} - {{ $camion->placa }}</h5>
            <p><strong>Placa:</strong> {{ $camion->placa }}</p>
            <p><strong>Modelo:</strong> {{ $camion->modelo }}</p>
            <p><strong>Camionero:</strong> 
                @if($camion->camionero)
                    {{ $camion->camionero->nombre }} {{ $camion->camionero->apellido }}
                @else
                    <span class="text-muted">Sin asignar</span>
                @endif
            </p>
        </div>
    </div>
    
    <div class="mt-3">
        <a href="{{ route('camiones.edit', $camion->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('camiones.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection
