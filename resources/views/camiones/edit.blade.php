@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Camión</h1>
    
    <form action="{{ route('camiones.update', $camion->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="placa">Placa:</label>
            <input type="text" name="placa" class="form-control" value="{{ $camion->placa }}" required maxlength="10">
        </div>

        <div class="form-group mb-3">
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" class="form-control" value="{{ $camion->modelo }}" required maxlength="45">
        </div>

        <div class="form-group mb-3">
            <label for="camionero_id">Camionero (Dueño):</label>
            <select name="camionero_id" class="form-control" required>
                <option value="">Seleccione un camionero</option>
                @foreach($camioneros as $camionero)
                    <option value="{{ $camionero->id }}" {{ $camion->camionero_id == $camionero->id ? 'selected' : '' }}>
                        {{ $camionero->nombre }} {{ $camionero->apellido }} - {{ $camionero->documento }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('camiones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
