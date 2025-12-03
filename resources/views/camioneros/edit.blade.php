@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">✏️ Editar Camionero: {{ $camionero->nombre }}</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('camioneros.update', $camionero->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Documento (solo lectura) -->
                            <div class="col-md-6 mb-3">
                                <label for="documento" class="form-label">Documento</label>
                                <input type="text" class="form-control bg-light" id="documento" 
                                       value="{{ $camionero->documento }}" readonly>
                                <small class="text-muted">El documento no se puede modificar</small>
                            </div>

                            <!-- Licencia (solo lectura) -->
                            <div class="col-md-6 mb-3">
                                <label for="licencia" class="form-label">Licencia</label>
                                <input type="text" class="form-control bg-light" id="licencia" 
                                       value="{{ $camionero->licencia }}" readonly>
                                <small class="text-muted">La licencia no se puede modificar</small>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Nombre -->
                            <div class="col-md-6 mb-3">
                                <label for="nombre" class="form-label">Nombre *</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" 
                                       value="{{ $camionero->nombre }}" required maxlength="255">
                            </div>

                            <!-- Apellido -->
                            <div class="col-md-6 mb-3">
                                <label for="apellido" class="form-label">Apellido *</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" 
                                       value="{{ $camionero->apellido }}" required maxlength="255">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Fecha Nacimiento (solo lectura) -->
                            <div class="col-md-6 mb-3">
                                <label for="fecha_nacimiento" class="form-label">Fecha Nacimiento</label>
                                <input type="date" class="form-control bg-light" id="fecha_nacimiento" 
                                       value="{{ $camionero->fecha_nacimiento }}" readonly>
                            </div>

                            <!-- Teléfono -->
                            <div class="col-md-6 mb-3">
                                <label for="telefono" class="form-label">Teléfono *</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" 
                                       value="{{ $camionero->telefono }}" required maxlength="20">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="{{ $camionero->email }}" maxlength="255">
                            </div>

                            <!-- Dirección -->
                            <div class="col-md-6 mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <textarea class="form-control" id="direccion" name="direccion" 
                                          rows="1" maxlength="500">{{ $camionero->direccion }}</textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('camioneros.index') }}" class="btn btn-secondary">
                                ← Cancelar
                            </a>
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    💾 Actualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
