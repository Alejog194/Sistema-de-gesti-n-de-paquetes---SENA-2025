@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Paquete</h1>
    
    <form action="{{ route('paquetes.store') }}" method="POST">
        @csrf
        
        <div class="form-group mb-3">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" class="form-control" required maxlength="255">
        </div>

        <div class="form-group mb-3">
            <label for="camionero_id">Camionero:</label>
            <select name="camionero_id" class="form-control" required>
                <option value="">Seleccione un camionero</option>
                @foreach($camioneros as $camionero)
                    <option value="{{ $camionero->id }}">
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
                    <option value="{{ $estado->id }}">
                        {{ $estado->estado }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('paquetes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
