@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Detalle de Paquete</h1>
    
    <form action="{{ route('detalles-paquete.update', $detallePaquete->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="paquete_id">Paquete:</label>
            <select name="paquete_id" class="form-control" required>
                <option value="">Seleccione un paquete</option>
                @foreach($paquetes as $paquete)
                    <option value="{{ $paquete->id }}" {{ $detallePaquete->paquete_id == $paquete->id ? 'selected' : '' }}>
                        Paquete #{{ $paquete->id }} - {{ $paquete->direccion }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="tipo_mercancia_id">Tipo de Mercancía:</label>
            <select name="tipo_mercancia_id" class="form-control" required>
                <option value="">Seleccione un tipo</option>
                @foreach($tiposMercancia as $tipo)
                    <option value="{{ $tipo->id }}" {{ $detallePaquete->tipo_mercancia_id == $tipo->id ? 'selected' : '' }}>
                        {{ $tipo->tipo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="dimension">Dimensión (ej: 20x30x15):</label>
            <input type="text" name="dimension" class="form-control" value="{{ $detallePaquete->dimension }}" required maxlength="45">
        </div>

        <div class="form-group mb-3">
            <label for="peso">Peso (ej: 5.5 kg):</label>
            <input type="text" name="peso" class="form-control" value="{{ $detallePaquete->peso }}" required maxlength="45">
        </div>

        <div class="form-group mb-3">
            <label for="fecha_entrega">Fecha de Entrega:</label>
            <input type="date" name="fecha_entrega" class="form-control" value="{{ $detallePaquete->fecha_entrega }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('detalles-paquete.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

