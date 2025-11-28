@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Camiones</h1>
    
    <a href="{{ route('camiones.create') }}" class="btn btn-primary mb-3">Nuevo Camión</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Placa</th>
                <th>Modelo</th>
                <th>Camionero (Dueño)</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($camiones as $camion)
            <tr>
                <td>{{ $camion->id }}</td>
                <td>{{ $camion->placa }}</td>
                <td>{{ $camion->modelo }}</td>
                <td>
                    @if($camion->camionero)
                        {{ $camion->camionero->nombre }} {{ $camion->camionero->apellido }}
                    @else
                        <span class="text-muted">Sin asignar</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('camiones.show', $camion->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('camiones.edit', $camion->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('camiones.destroy', $camion->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar camión?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
