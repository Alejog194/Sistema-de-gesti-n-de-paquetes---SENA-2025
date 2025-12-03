@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Bienvenida -->
    <div class="text-center mb-5">
        <h1 class="display-4 text-primary">🚚 Dashboard SenaDelivery</h1>
        <p class="lead">Gestiona todas las operaciones de tu plataforma de entregas</p>
        <p class="text-muted">Bienvenido, {{ Auth::user()->name }}!</p>
    </div>

    <!-- Tarjetas de módulos -->
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
                    <a href="{{ route('camioneros.index') }}" class="btn btn-primary w-100">
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
                    <a href="{{ route('camiones.index') }}" class="btn btn-success w-100">
                        Administrar Camiones
                    </a>
                </div>
            </div>
        </div>

        <!-- Paquetes -->
        <div class="col-md-4 mb-4">
            <div class="card border-warning h-100">
                <div class="card-header bg-warning text-white">
                    <h5 class="mb-0">📦 Paquetes</h5>
                </div>
                <div class="card-body">
                    <p>Gestiona los envíos: registro, seguimiento y estados de entrega.</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('paquetes.index') }}" class="btn btn-warning w-100">
                        Administrar Paquetes
                    </a>
                </div>
            </div>
        </div>

        <!-- Tipo Mercancía -->
        <div class="col-md-4 mb-4">
            <div class="card border-info h-100">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">🏷️ Tipo de Mercancía</h5>
                </div>
                <div class="card-body">
                    <p>Clasifica los paquetes: frágil, urgente, refrigerado, etc.</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('tipo-mercancia.index') }}" class="btn btn-info w-100">
                        Administrar Tipos
                    </a>
                </div>
            </div>
        </div>

        <!-- Detalle Paquetes -->
        <div class="col-md-4 mb-4">
            <div class="card border-danger h-100">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">📋 Detalle Paquetes</h5>
                </div>
                <div class="card-body">
                    <p>Información específica de cada paquete y su contenido.</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('detalle-paquetes.index') }}" class="btn btn-danger w-100">
                        Administrar Detalles
                    </a>
                </div>
            </div>
        </div>

        <!-- Reportes -->
        <div class="col-md-4 mb-4">
            <div class="card border-secondary h-100">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">📊 Reportes</h5>
                </div>
                <div class="card-body">
                    <p>Genera reportes de entregas, rendimiento y estadísticas.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-secondary w-100">
                        Ver Reportes
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Estadísticas rápidas -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>📈 Resumen del Sistema</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <h3 class="text-primary">{{ \App\Models\Camionero::count() }}</h3>
                            <p>Camioneros Activos</p>
                        </div>
                        <div class="col-md-3">
                            <h3 class="text-success">{{ \App\Models\Camion::count() ?? '0' }}</h3>
                            <p>Camiones Registrados</p>
                        </div>
                        <div class="col-md-3">
                            <h3 class="text-warning">{{ \App\Models\Paquete::count() ?? '0' }}</h3>
                            <p>Paquetes Pendientes</p>
                        </div>
                        <div class="col-md-3">
                            <h3 class="text-info">{{ \App\Models\TipoMercancia::count() ?? '0' }}</h3>
                            <p>Tipos de Mercancía</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
