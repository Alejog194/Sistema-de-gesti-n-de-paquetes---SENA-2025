@extends('layouts.app')

@section('content')
<div class="text-center mt-5">
    <!-- Imagen de camión -->
    <img src="https://cdn-icons-png.flaticon.com/512/3097/3097140.png" 
         alt="Camión de delivery" 
         width="100" 
         height="100"
         class="mb-4">

    <h1 class="display-4 fw-bold text-primary">¡Bienvenido a SenaDelivery! 🚚</h1>
    <p class="lead text-muted">Tu plataforma de entrega de paquetes confiable</p>
    
    <div class="mt-5">
        <a href="{{ route('camioneros.index') }}" class="btn btn-primary btn-lg me-3">
            📦 Ver Camioneros
        </a>
        <a href="/login" class="btn btn-outline-primary btn-lg">
            🔐 Iniciar Sesión
        </a>
    </div>
</div>
@endsection