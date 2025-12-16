<?php /*
<!-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Estado de Paquete</h1>
    
    <form action="{{ route('estados-paquete.update', $estadoPaquete) }}" method="POST">
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
        <a href="{{ route('estados-paquete.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
-- >
*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>Estados de Paquetes</title>
    <style>
        body { font-family: Arial; padding: 20px; }
    </style>
</head>
<body>
    <h1>TEST - Estados de Paquetes</h1>
    <p>Si ves esto, el problema está en layouts/app.blade.php</p>
    <p>Total de estados: {{ $estados->count() }}</p>
</body>
</html>
