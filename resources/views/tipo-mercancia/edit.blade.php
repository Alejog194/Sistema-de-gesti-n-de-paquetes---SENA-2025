@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Tipo de Mercancía</h1>
    
    <form action="{{ route('tipo-mercancia.update', $tipoMercancia->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="tipo">Tipo de Mercancía:</label>
            <input type="text" name="tipo" class="form-control" value="{{ $tipoMercancia->tipo }}" required maxlength="255">
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('tipo-mercancia.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
