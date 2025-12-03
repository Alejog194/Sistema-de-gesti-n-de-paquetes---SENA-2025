@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">👤 Detalles del Camionero</h4>
                        <div class="btn-group">
                            <a href="{{ route('camioneros.edit', $camionero->id) }}" 
                               class="btn btn-warning btn-sm">✏️ Editar</a>
                            <a href="{{ route('camioneros.index') }}" 
                               class="btn btn-light btn-sm">← Volver</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Información Personal -->
                        <div class="col-md-6">
                            <h5 class="border-bottom pb-2">📋 Información Personal</h5>
                            <table class="table table-sm">
                                <tr>
                                    <th width="40%">Documento:</th>
                                    <td>{{ $camionero->documento }}</td>
                                </tr>
                                <tr>
                                    <th>Nombre:</th>
                                    <td>{{ $camionero->nombre }}</td>
                                </tr>
                                <tr>
                                    <th>Apellido:</th>
                                    <td>{{ $camionero->apellido }}</td>
                                </tr>
                                <tr>
                                    <th>Fecha Nacimiento:</th>
                                    <td>{{ $camionero->fecha_nacimiento }}</td>
                                </tr>
                            </table>
                        </div>

                        <!-- Información Profesional -->
                        <div class="col-md-6">
                            <h5 class="border-bottom pb-2">🚚 Información Profesional</h5>
                            <table class="table table-sm">
                                <tr>
                                    <th width="40%">Licencia:</th>
                                    <td>
                                        <span class="badge bg-primary">{{ $camionero->licencia }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Teléfono:</th>
                                    <td>{{ $camionero->telefono }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $camionero->email ?? 'No registrado' }}</td>
                                </tr>
                                <tr>
                                    <th>Dirección:</th>
                                    <td>{{ $camionero->direccion ?? 'No registrada' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="mt-4 pt-3 border-top">
                        <div class="d-flex justify-content-between">
                            <form action="{{ route('camioneros.destroy', $camionero->id) }}" 
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-danger"
                                        onclick="return confirm('¿Eliminar permanentemente a {{ $camionero->nombre }}?')">
                                    🗑️ Eliminar Camionero
                                </button>
                            </form>
                            <div>
                                <a href="{{ route('camioneros.create') }}" 
                                   class="btn btn-outline-primary">➕ Nuevo</a>
                                <a href="{{ route('camioneros.index') }}" 
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
