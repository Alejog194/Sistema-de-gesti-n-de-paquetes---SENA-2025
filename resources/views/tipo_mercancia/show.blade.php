@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Tipo de Mercancía</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $tipoMercancia->tipo }}</h5>
            <p><strong>Tipo:</strong> {{ $tipoMercancia->tipo }}</p>
            <p><strong>Requiere cuidado especial:</strong> 
                {{ $tipoMercancia->es_fragil || $tipoMercancia->es_perecedero ? 'Sí' : 'No' }}
            </p>
        </div>
    </div>
    
    <div class="mt-3">
        <a href="{{ route('tipo-mercancia.edit', $tipoMercancia->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('tipo-mercancia.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection
