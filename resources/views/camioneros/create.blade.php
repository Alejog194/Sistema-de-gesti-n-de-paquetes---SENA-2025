@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Camionero</h1>
    
    <form action="{{ route('camioneros.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="documento">Documento:</label>
            <input type="text" name="documento" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="licencia">Licencia:</label>
            <input type="text" name="licencia" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('camioneros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
