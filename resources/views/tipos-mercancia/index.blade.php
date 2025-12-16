@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Tipos de Mercancía</h1>
    
    {{-- Enlace para crear un nuevo tipo de mercancía, redirige a la vista de creación con estilo de botón primario --}}
    <a href="/tipos-mercancia/create" class="btn btn-primary mb-3">Nuevo Tipo</a>
    
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
                <th>Características</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tiposMercancia as $tipo)
            <tr>
                <td>{{ $tipo->id }}</td>
                <td>{{ $tipo->tipo }}</td>
                <td>
                    @if($tipo->es_fragil)
                        <span class="badge bg-warning">Frágil</span>
                    @endif
                    @if($tipo->es_perecedero)
                        <span class="badge bg-danger">Perecedero</span>
                    @endif
                    @if(!$tipo->es_fragil && !$tipo->es_perecedero)
                        <span class="badge bg-secondary">General</span>
                    @endif
                </td>
                <td>
                    <a href="/tipos-mercancia/{{ $tipo->id }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="/tipos-mercancia/{{ $tipo->id }}/edit" class="btn btn-warning btn-sm">Editar</a>
                    <form action="/tipos-mercancia/{{ $tipo->id }}" method="POST" style="display:inline;">
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
