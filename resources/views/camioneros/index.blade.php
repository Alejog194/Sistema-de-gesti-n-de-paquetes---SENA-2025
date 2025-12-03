@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">📦 Lista de Camioneros</h1>
        <a href="{{ route('camioneros.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Nuevo Camionero
        </a>
    </div>

    <!-- Mensajes de éxito -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($camioneros->count() > 0)
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Licencia</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($camioneros as $camionero)
                <tr>
                    <td>{{ $camionero->id }}</td>
                    <td>{{ $camionero->documento }}</td>
                    <td>{{ $camionero->nombre }}</td>
                    <td>{{ $camionero->apellido }}</td>
                    <td>{{ $camionero->licencia }}</td>
                    <td>{{ $camionero->telefono }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('camioneros.show', $camionero->id) }}" 
                               class="btn btn-info btn-sm" 
                               title="Ver detalles">
                                👁️
                            </a>
                            <a href="{{ route('camioneros.edit', $camionero->id) }}" 
                               class="btn btn-warning btn-sm" 
                               title="Editar">
                                ✏️
                            </a>
                            <form action="{{ route('camioneros.destroy', $camionero->id) }}" 
                                  method="POST" 
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de eliminar a {{ $camionero->nombre }}?')"
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
        <h4>📭 No hay camioneros registrados</h4>
        <p>Comienza agregando tu primer camionero.</p>
        <a href="{{ route('camioneros.create') }}" class="btn btn-primary">
            + Crear Primer Camionero
        </a>
    </div>
    @endif
</div>
@endsection