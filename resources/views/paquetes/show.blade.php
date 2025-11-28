@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Paquete</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Paquete #{{ $paquete->id }}</h5>
            <p><strong>Dirección:</strong> {{ $paquete->direccion }}</p>
            <p><strong>Camionero:</strong> 
                @if($paquete->camionero)
                    {{ $paquete->camionero->nombre }} {{ $paquete->camionero->apellido }}
                @else
                    <span class="text-muted">Sin asignar</span>
                @endif
            </p>
            <p><strong>Estado:</strong> 
                @if($paquete->estado)
                    {{ $paquete->estado->estado }}
                @else
                    <span class="text-muted">Sin estado</span>
                @endif
            </p>
        </div>
    </div>
    
    <div class="mt-3">
        <a href="{{ route('paquetes.edit', $paquete->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('paquetes.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection
