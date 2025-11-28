@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Tipo de Mercancía</h1>
    
    <form action="{{ route('tipo-mercancia.store') }}" method="POST">
        @csrf
        
        <div class="form-group mb-3">
            <label for="tipo">Tipo de Mercancía:</label>
            <input type="text" name="tipo" class="form-control" required maxlength="255" placeholder="Ej: Frágil, Perecedero, Electrónico...">
        </div>
        
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('tipo-mercancia.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
