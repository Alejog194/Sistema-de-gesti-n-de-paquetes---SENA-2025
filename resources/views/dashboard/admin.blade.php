@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Bienvenida para ADMIN -->
    <div class="text-center mb-5">
        <h1 class="display-4 text-primary">🚚 Panel de Administración</h1>
        <p class="lead">Gestiona todas las operaciones del sistema</p>
        <p class="text-muted">
            <strong>Administrador:</strong> {{ Auth::user()->name }}
            <span class="badge bg-danger ms-2">ADMIN</span>
        </p>
    </div>

    <!-- Estadísticas rápidas -->
    <div class="row mb-5">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <h2>{{ $stats['camioneros'] ?? 0 }}</h2>
                    <p>Camioneros</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <h2>{{ $stats['camiones'] ?? 0 }}</h2>
                    <p>Camiones</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-dark">
                <div class="card-body text-center">
                    <h2>{{ $stats['paquetes'] ?? 0 }}</h2>
                    <p>Paquetes Totales</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body text-center">
                    <h2>{{ $stats['tipos_mercancia'] ?? 0 }}</h2>
                    <p>Tipos de Mercancía</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjetas de módulos de ADMINISTRADOR (igual a tu dashboard actual) -->
    <div class="row">
        <!-- Camioneros -->
        <div class="col-md-4 mb-4">
            <div class="card border-primary h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">👤 Camioneros</h5>
                </div>
                <div class="card-body">
                    <p>Gestiona el personal de entrega: agregar, editar, eliminar y asignar camiones.</p>
                </div>
                <div class="card-footer">
                    <a href="/camioneros" class="btn btn-primary w-100">
                        Administrar Camioneros
                    </a>
                </div>
            </div>
        </div>

        <!-- Camiones -->
        <div class="col-md-4 mb-4">
            <div class="card border-success h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">🚛 Camiones</h5>
                </div>
                <div class="card-body">
                    <p>Controla la flota de vehículos: registro, mantenimiento y asignaciones.</p>
                </div>
                <div class="card-footer">
                    <a href="/camiones" class="btn btn-success w-100">
                        Administrar Camiones
                    </a>
                </div>
            </div>
        </div>

        <!-- ... resto de tus tarjetas de administrador ... -->
    </div>
</div>
@endsection