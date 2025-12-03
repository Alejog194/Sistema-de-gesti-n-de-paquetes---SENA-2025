@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">🚛 Lista de Camiones</h1>
        <a href="{{ route('camiones.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Nuevo Camión
        </a>
    </div>

    <!-- Mensajes de éxito -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($camiones->count() > 0)
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Placa</th>
                    <th>Modelo</th>
                    <th>Descripción</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($camiones as $camion)
                <tr>
                    <td>{{ $camion->id }}</td>
                    <td>
                        <span class="badge bg-secondary fs-6">{{ $camion->placa }}</span>
                    </td>
                    <td>{{ $camion->modelo }}</td>
                    <td>{{ $camion->descripcion_completa }}</td>
                    <td>{{ $camion->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('camiones.show', $camion->id) }}" 
                               class="btn btn-info btn-sm" 
                               title="Ver detalles">
                                👁️
                            </a>
                            <a href="{{ route('camiones.edit', $camion->id) }}" 
                               class="btn btn-warning btn-sm" 
                               title="Editar">
                                ✏️
                            </a>
                            <form action="{{ route('camiones.destroy', $camion->id) }}" 
                                  method="POST" 
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de eliminar el camión {{ $camion->placa }}?')"
                                        title="Eliminar">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="alert alert-info text-center">
        <h4>🚛 No hay camiones registrados</h4>
        <p>Comienza agregando tu primer camión.</p>
        <a href="{{ route('camiones.create') }}" class="btn btn-primary">
            + Crear Primer Camión
        </a>
    </div>
    @endif
</div>
@endsection