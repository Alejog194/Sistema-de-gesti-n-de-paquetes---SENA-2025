@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Paquete</h1>
    
    <form action="{{ route('paquetes.update', $paquete->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" class="form-control" value="{{ $paquete->direccion }}" required maxlength="255">
        </div>

        <div class="form-group mb-3">
            <label for="camionero_id">Camionero:</label>
            <select name="camionero_id" class="form-control" required>
                <option value="">Seleccione un camionero</option>
                @foreach($camioneros as $camionero)
                    <option value="{{ $camionero->id }}" {{ $paquete->camionero_id == $camionero->id ? 'selected' : '' }}>
                        {{ $camionero->nombre }} {{ $camionero->apellido }} - {{ $camionero->documento }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="estado_id">Estado:</label>
            <select name="estado_id" class="form-control" required>
                <option value="">Seleccione un estado</option>
                @foreach($estados as $estado)
                    <option value="{{ $estado->id }}" {{ $paquete->estado_id == $estado->id ? 'selected' : '' }}>
                        {{ $estado->estado }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('paquetes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
