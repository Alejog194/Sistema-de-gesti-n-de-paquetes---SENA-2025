@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">✏️ Editar Camión: {{ $camion->placa }}</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('camiones.update', $camion->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Placa -->
                        <div class="mb-3">
                            <label for="placa" class="form-label">Placa *</label>
                            <input type="text" class="form-control" id="placa" name="placa" 
                                   value="{{ $camion->placa }}" required maxlength="10">
                        </div>

                        <!-- Modelo -->
                        <div class="mb-3">
                            <label for="modelo" class="form-label">Modelo *</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" 
                                   value="{{ $camion->modelo }}" required maxlength="10">
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('camiones.index') }}" class="btn btn-secondary">
                                ← Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                💾 Actualizar Camión
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
