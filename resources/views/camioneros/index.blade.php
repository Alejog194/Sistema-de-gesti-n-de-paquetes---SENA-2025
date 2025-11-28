@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Camioneros</h1>
    
    <a href="{{ route('camioneros.create') }}" class="btn btn-primary mb-3">Nuevo Camionero</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Licencia</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($camioneros as $camionero)
            <tr>
                <td>{{ $camionero->id }}</td>
                <td>{{ $camionero->documento }}</td>
                <td>{{ $camionero->nombre }}</td>
                <td>{{ $camionero->apellido }}</td>
                <td>{{ $camionero->licencia }}</td>
                <td>{{ $camionero->telefono }}</td>
                <td>
                    <a href="{{ route('camioneros.show', $camionero->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('camioneros.edit', $camionero->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('camioneros.destroy', $camionero->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar camionero?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
