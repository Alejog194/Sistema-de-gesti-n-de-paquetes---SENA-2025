@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Paquetes</h1>
    
    <a href="{{ route('paquetes.create') }}" class="btn btn-primary mb-3">Nuevo Paquete</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dirección</th>
                <th>Camionero</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paquetes as $paquete)
            <tr>
                <td>{{ $paquete->id }}</td>
                <td>{{ $paquete->direccion }}</td>
                <td>
                    @if($paquete->camionero)
                        {{ $paquete->camionero->nombre }} {{ $paquete->camionero->apellido }}
                    @else
                        <span class="text-muted">Sin asignar</span>
                    @endif
                </td>
                <td>
                    @if($paquete->estado)
                        {{ $paquete->estado->estado }}
                    @else
                        <span class="text-muted">Sin estado</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('paquetes.show', $paquete->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('paquetes.edit', $paquete->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('paquetes.destroy', $paquete->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar paquete?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
