@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">🚛 Detalles del Camión</h4>
                        <div class="btn-group">
                            <a href="{{ route('camiones.edit', $camion->id) }}" 
                               class="btn btn-warning btn-sm">✏️ Editar</a>
                            <a href="{{ route('camiones.index') }}" 
                               class="btn btn-light btn-sm">← Volver</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="40%">ID:</th>
                            <td>{{ $camion->id }}</td>
                        </tr>
                        <tr>
                            <th>Placa:</th>
                            <td>
                                <span class="badge bg-dark fs-5">{{ $camion->placa }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Modelo:</th>
                            <td>{{ $camion->modelo }}</td>
                        </tr>
                        <tr>
                            <th>Descripción:</th>
                            <td>{{ $camion->descripcion_completa }}</td>
                        </tr>
                        <tr>
                            <th>Registrado:</th>
                            <td>{{ $camion->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Última actualización:</th>
                            <td>{{ $camion->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>

                    <!-- Botones -->
                    <div class="mt-4 pt-3 border-top">
                        <div class="d-flex justify-content-between">
                            <form action="{{ route('camiones.destroy', $camion->id) }}" 
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-danger"
                                        onclick="return confirm('¿Eliminar permanentemente el camión {{ $camion->placa }}?')">
                                    🗑️ Eliminar Camión
                                </button>
                            </form>
                            <div>
                                <a href="{{ route('camiones.create') }}" 
                                   class="btn btn-outline-primary">➕ Nuevo</a>
                                <a href="{{ route('camiones.index') }}" 
                                   class="btn btn-primary">📋 Lista Completa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection