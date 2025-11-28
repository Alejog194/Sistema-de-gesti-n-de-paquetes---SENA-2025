@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Detalles de Paquetes</h1>
    
    <a href="{{ route('detalle-paquete.create') }}" class="btn btn-primary mb-3">Nuevo Detalle</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paquete</th>
                <th>Tipo Mercancía</th>
                <th>Dimensión</th>
                <th>Peso</th>
                <th>Fecha Entrega</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detallePaquetes as $detalle)
            <tr>
                <td>{{ $detalle->id }}</td>
                <td>
                    @if($detalle->paquete)
                        Paquete #{{ $detalle->paquete->id }}
                    @else
                        <span class="text-muted">Sin paquete</span>
                    @endif
                </td>
                <td>
                    @if($detalle->tipoMercancia)
                        {{ $detalle->tipoMercancia->tipo }}
                    @else
                        <span class="text-muted">Sin tipo</span>
                    @endif
                </td>
                <td>{{ $detalle->dimension }}</td>
                <td>{{ $detalle->peso }}</td>
                <td>{{ $detalle->fecha_entrega }}</td>
                <td>
                    <a href="{{ route('detalle-paquete.show', $detalle->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('detalle-paquete.edit', $detalle->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('detalle-paquete.destroy', $detalle->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar detalle de paquete?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
