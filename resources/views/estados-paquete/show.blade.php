@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Estado de Paquete</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ID: {{ $estadoPaquete->id }}</h5>
            <p class="card-text"><strong>Estado:</strong> {{ $estadoPaquete->estado }}</p>
            <p class="card-text"><strong>Creado:</strong> {{ $estadoPaquete->created_at->format('d/m/Y H:i') }}</p>
            <p class="card-text"><strong>Actualizado:</strong> {{ $estadoPaquete->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>
    
    <div class="mt-3">
        <a href="{{ route('estados-paquete.edit', $estadoPaquete) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('estados-paquete.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection
