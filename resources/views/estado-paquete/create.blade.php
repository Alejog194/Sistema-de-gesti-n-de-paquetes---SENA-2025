@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Estado de Paquete</h1>
    
    <form action="{{ route('estado-paquetes.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="estado">Nombre del Estado:</label>
            <input type="text" name="estado" id="estado" class="form-control" 
                   required maxlength="45" placeholder="Ej: En tránsito, Entregado, etc.">
            @error('estado')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('estado-paquetes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
