@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Estado de Paquete</h1>
    
    <form action="{{ route('estado-paquetes.update', $estadoPaquete) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="estado">Nombre del Estado:</label>
            <input type="text" name="estado" id="estado" class="form-control" 
                   value="{{ old('estado', $estadoPaquete->estado) }}"
                   required maxlength="45">
            @error('estado')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('estado-paquetes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
