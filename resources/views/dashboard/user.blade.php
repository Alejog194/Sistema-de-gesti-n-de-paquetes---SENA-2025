@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Bienvenida para USUARIO -->
    <div class="text-center mb-5">
        <h1 class="display-4 text-primary">📦 SenaDelivery</h1>
        <p class="lead">Tu plataforma de seguimiento de paquetes</p>
        <p class="text-muted">
            Bienvenido, <strong>{{ Auth::user()->name }}</strong>
            <span class="badge bg-success ms-2">USUARIO</span>
        </p>
    </div>

    <!-- Resumen del usuario -->
    <div class="row mb-5">
        <div class="col-md-6">
            <div class="card bg-info text-white">
                <div class="card-body text-center">
                    <h2>{{ $paquetesCount ?? 0 }}</h2>
                    <p>Mis Paquetes</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <h2>{{ $misPaquetes->where('estado', 'entregado')->count() ?? 0 }}</h2>
                    <p>Paquetes Entregados</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Últimos paquetes -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">📦 Mis Últimos Paquetes</h5>
        </div>
        <div class="card-body">
            @if($misPaquetes->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($misPaquetes as $paquete)
                            <tr>
                                <td>{{ $paquete->codigo ?? 'N/A' }}</td>
                                <td>{{ Str::limit($paquete->descripcion, 30) }}</td>
                                <td>
                                    <span class="badge bg-{{ $paquete->estado == 'entregado' ? 'success' : 'warning' }}">
                                        {{ $paquete->estado ?? 'Pendiente' }}
                                    </span>
                                </td>
                                <td>{{ $paquete->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('paquetes.show', $paquete) }}" class="btn btn-sm btn-info">
                                        Ver Detalles
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('paquetes.mis') }}" class="btn btn-primary">
                        Ver Todos Mis Paquetes
                    </a>
                </div>
            @else
                <div class="text-center py-4">
                    <p class="text-muted">No tienes paquetes registrados todavía.</p>
                    <a href="{{ route('paquetes.create') }}" class="btn btn-success">
                        Registrar Mi Primer Paquete
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Acciones rápidas para usuarios -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card border-primary h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">📦 Nuevo Paquete</h5>
                </div>
                <div class="card-body">
                    <p>Registra un nuevo paquete para enviar.</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('paquetes.create') }}" class="btn btn-primary w-100">
                        Registrar Paquete
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-success h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">📋 Mis Envíos</h5>
                </div>
                <div class="card-body">
                    <p>Revisa el historial de todos tus paquetes.</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('paquetes.mis') }}" class="btn btn-success w-100">
                        Ver Mis Paquetes
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-info h-100">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">📊 Seguimiento</h5>
                </div>
                <div class="card-body">
                    <p>Consulta el estado de tus paquetes en tiempo real.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-info w-100">
                        Rastrear Paquete
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection