@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Tipos de Mercancía</h1>
    
    <a href="{{ route('tipo-mercancia.create') }}" class="btn btn-primary mb-3">Nuevo Tipo</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipoMercancias as $tipo)
            <tr>
                <td>{{ $tipo->id }}</td>
                <td>{{ $tipo->tipo }}</td>
                <td>
                    <a href="{{ route('tipo-mercancia.show', $tipo->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('tipo-mercancia.edit', $tipo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('tipo-mercancia.destroy', $tipo->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar tipo de mercancía?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
