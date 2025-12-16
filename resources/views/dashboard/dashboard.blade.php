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
                    <a href="/paquetes" class="btn btn-warning w-100">
                        Administrar Paquetes
                    </a>
                </div>
            </div>
        </div>

        <!-- Estados Paquetes - COLOR MORADO (único) -->
        <div class="col-md-4 mb-4">
            <div class="card border-purple h-100">
                <div class="card-header bg-purple text-white">
                    <h5 class="mb-0">🏷️ Estados Paquetes</h5>
                </div>
                <div class="card-body">
                    <p>Gestiona los estados de los paquetes: pendiente, en tránsito, entregado, etc.</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('estados-paquetes.index') }}" class="btn btn-purple w-100">
                        Administrar Estados
                    </a>
                </div>
            </div>
        </div>

        <!-- Tipo Mercancía - COLOR NARANJA (único) -->
        <div class="col-md-4 mb-4">
            <div class="card border-orange h-100">
                <div class="card-header bg-orange text-white">
                    <h5 class="mb-0">📋 Tipo de Mercancía</h5>
                </div>
                <div class="card-body">
                    <p>Clasifica los paquetes: frágil, urgente, refrigerado, etc.</p>
                </div>
                <div class="card-footer">
                    <a href="/tipos-mercancia" class="btn btn-orange w-100">
                        Administrar Tipos
                    </a>
                </div>
            </div>
        </div>

        <!-- Detalle Paquetes - COLOR ROJO (único) -->
        <div class="col-md-4 mb-4">
            <div class="card border-danger h-100">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">📄 Detalle Paquetes</h5>
                </div>
                <div class="card-body">
                    <p>Información específica de cada paquete y su contenido.</p>
                </div>
                <div class="card-footer">
                    <a href="/detalles-paquetes" class="btn btn-danger w-100">
                        Administrar Detalles
                    </a>
                </div>
            </div>
        </div>

        <!-- Reportes - COLOR VERDE OSCURO (único) -->
        <div class="col-md-4 mb-4">
            <div class="card border-teal h-100">
                <div class="card-header bg-teal text-white">
                    <h5 class="mb-0">📊 Reportes</h5>
                </div>
                <div class="card-body">
                    <p>Genera reportes de entregas, rendimiento y estadísticas.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-teal w-100">
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
                            <h3 class="text-primary">{{ \App\Models\Camionero::count() ?? '0' }}</h3>
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
                            <h3 class="text-purple">{{ \App\Models\TipoMercancia::count() ?? '0' }}</h3>
                            <p>Tipos de Mercancía</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Colores personalizados para diferenciar las tarjetas */
    .bg-purple {
        background-color: #6f42c1 !important;
    }
    .border-purple {
        border-color: #6f42c1 !important;
    }
    .btn-purple {
        background-color: #6f42c1;
        border-color: #6f42c1;
        color: white;
    }
    .btn-purple:hover {
        background-color: #5a32a3;
        border-color: #5a32a3;
    }
    .text-purple {
        color: #6f42c1 !important;
    }

    .bg-orange {
        background-color: #fd7e14 !important;
    }
    .border-orange {
        border-color: #fd7e14 !important;
    }
    .btn-orange {
        background-color: #fd7e14;
        border-color: #fd7e14;
        color: white;
    }
    .btn-orange:hover {
        background-color: #e06a00;
        border-color: #e06a00;
    }

    .bg-teal {
        background-color: #20c997 !important;
    }
    .border-teal {
        border-color: #20c997 !important;
    }
    .btn-teal {
        background-color: #20c997;
        border-color: #20c997;
        color: white;
    }
    .btn-teal:hover {
        background-color: #1aa179;
        border-color: #1aa179;
    }
</style>
@endsection 
 