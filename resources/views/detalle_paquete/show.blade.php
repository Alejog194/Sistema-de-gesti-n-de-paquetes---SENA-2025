@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Paquete</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detalle #{{ $detallePaquete->id }}</h5>
            <p><strong>Paquete:</strong> 
                @if($detallePaquete->paquete)
                    #{{ $detallePaquete->paquete->id }} - {{ $detallePaquete->paquete->direccion }}
                @else
                    <span class="text-muted">Sin paquete</span>
                @endif
            </p>
            <p><strong>Tipo de Mercancía:</strong> 
                @if($detallePaquete->tipoMercancia)
                    {{ $detallePaquete->tipoMercancia->tipo }}
                @else
                    <span class="text-muted">Sin tipo</span>
                @endif
            </p>
            <p><strong>Dimensión:</strong> {{ $detallePaquete->dimension }}</p>
            <p><strong>Peso:</strong> {{ $detallePaquete->peso }}</p>
            <p><strong>Fecha de Entrega:</strong> {{ $detallePaquete->fecha_entrega }}</p>
            <p><strong>Volumen calculado:</strong> 
                {{ $detallePaquete->volumen ?? 0 }} cm³
            </p>
        </div>
    </div>
    
    <div class="mt-3">
        <a href="{{ route('detalle-paquete.edit', $detallePaquete->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('detalle-paquete.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection
