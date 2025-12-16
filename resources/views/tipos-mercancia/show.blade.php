@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">
                <i class="bi bi-eye"></i> Detalles del Tipo de Mercancía
            </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>ID:</strong> {{ $tipoMercancia->id }}</p>
                    <p><strong>Tipo:</strong> {{ $tipoMercancia->tipo }}</p>
                    
                    <p><strong>Características:</strong></p>
                    <div class="mb-3">
                        @if($tipoMercancia->es_fragil)
                            <span class="badge bg-warning">Frágil</span>
                        @endif
                        @if($tipoMercancia->es_perecedero)
                            <span class="badge bg-danger">Perecedero</span>
                        @endif
                        @if(!$tipoMercancia->es_fragil && !$tipoMercancia->es_perecedero)
                            <span class="badge bg-secondary">General</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <p><strong>Creado:</strong> {{ $tipoMercancia->created_at ? $tipoMercancia->created_at->format('d/m/Y H:i:s') : 'N/A' }}</p>
                    <p><strong>Actualizado:</strong> {{ $tipoMercancia->updated_at ? $tipoMercancia->updated_at->format('d/m/Y H:i:s') : 'N/A' }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="/tipos-mercancia/{{ $tipoMercancia->id }}/edit" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Editar
            </a>
            <a href="/tipos-mercancia" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
        </div>
    </div>
</div>
@endsection
