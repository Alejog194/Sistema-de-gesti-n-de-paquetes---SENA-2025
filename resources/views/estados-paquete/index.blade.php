@extends('layouts.app')

@section('title', 'Estados de Paquetes')

@section('content')
<div style="margin-bottom: 30px;">
    <h1 style="color: #333; margin-bottom: 10px;">🏷️ Estados de Paquetes</h1>
    <p style="color: #666;">Gestiona los diferentes estados que pueden tener los paquetes en el sistema.</p>
    
    <a href="{{ route('estados-paquete.create') }}" 
       style="background: #0d6efd; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block;">
        ＋ Crear Nuevo Estado
    </a>
</div>

@if($estados->count() > 0)
<div class="card">
    <div style="overflow-x: auto;">
        <table style="width: 100%; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <thead style="background: #f8f9fa;">
                <tr>
                    <th style="padding: 15px; text-align: left; border-bottom: 2px solid #dee2e6;">ID</th>
                    <th style="padding: 15px; text-align: left; border-bottom: 2px solid #dee2e6;">Estado</th>
                    <th style="padding: 15px; text-align: left; border-bottom: 2px solid #dee2e6;">Creado</th>
                    <th style="padding: 15px; text-align: left; border-bottom: 2px solid #dee2e6; text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estados as $estado)
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 15px;">{{ $estado->id }}</td>
                    <td style="padding: 15px; font-weight: 500;">{{ $estado->estado }}</td>
                    <td style="padding: 15px; color: #666;">{{ $estado->created_at->format('d/m/Y') }}</td>
                    <td style="padding: 15px; text-align: center;">
                        <a href="{{ route('estados-paquete.show', $estado) }}" 
                           style="background: #17a2b8; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; margin: 2px;">
                            👁️ Ver
                        </a>
                        <a href="{{ route('estados-paquete.edit', $estado) }}" 
                           style="background: #ffc107; color: #212529; padding: 6px 12px; text-decoration: none; border-radius: 4px; margin: 2px;">
                            ✏️ Editar
                        </a>
                        <form action="{{ route('estados-paquete.destroy', $estado) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    style="background: #dc3545; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; margin: 2px;"
                                    onclick="return confirm('¿Eliminar este estado?')">
                                🗑️ Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
<div style="background: #e7f3ff; padding: 20px; border-radius: 8px; border: 1px solid #b3d7ff;">
    <p style="margin: 0; color: #004085;">
        ℹ️ No hay estados de paquetes registrados aún.
        <a href="{{ route('estados-paquete.create') }}" style="color: #0056b3; font-weight: bold;">Crea el primero</a>
    </p>
</div>
@endif

<div style="margin-top: 30px;">
    <a href="/home" style="color: #6c757d; text-decoration: none; padding: 10px; display: inline-block;">
        ← Volver al Dashboard
    </a>
</div>
@endsection
