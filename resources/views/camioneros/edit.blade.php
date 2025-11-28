@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Camionero</h1>
    
    <form action="{{ route('camioneros.update', $camionero->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="documento">Documento:</label>
            <input type="text" name="documento" class="form-control" value="{{ $camionero->documento }}" required>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $camionero->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" class="form-control" value="{{ $camionero->apellido }}" required>
        </div>

        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" class="form-control" value="{{ $camionero->fecha_nacimiento }}" required>
        </div>

        <div class="form-group">
            <label for="licencia">Licencia:</label>
            <input type="text" name="licencia" class="form-control" value="{{ $camionero->licencia }}" required>
        </div>
        
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" class="form-control" value="{{ $camionero->telefono }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('camioneros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection