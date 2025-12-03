<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SenaDelivery - @yield('title')</title>
    
    <!-- Bootstrap 5 desde CDN con fallback -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos básicos de respaldo */
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f8f9fa; 
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #0d6efd;
            color: white;
            padding: 10px 20px;
        }
        .sidebar {
            background-color: #343a40;
            color: white;
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 60px;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }
            .main-content {
                margin-left: 0;
            }
        }
        .card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Navbar Simple -->
    <nav class="navbar">
        <div class="container-fluid">
            <span style="font-size: 1.5rem; font-weight: bold;">
                🚚 SenaDelivery
            </span>
            <div style="color: white;">
                Bienvenido, {{ Auth::user()->name ?? 'Usuario' }}
                | <a href="{{ route('logout') }}" 
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                     style="color: white; text-decoration: none;">
                    Cerrar Sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <!-- Sidebar Simple -->
    <div class="sidebar">
        <div style="padding: 20px;">
            <h5>Menú Principal</h5>
            <ul style="list-style: none; padding: 0;">
                <li style="margin: 10px 0;">
                    <a href="/home" style="color: white; text-decoration: none; display: block; padding: 8px;">
                        📊 Dashboard
                    </a>
                </li>
                <li style="margin: 10px 0;">
                    <a href="/camioneros" style="color: white; text-decoration: none; display: block; padding: 8px;">
                        👷 Camioneros
                    </a>
                </li>
                <li style="margin: 10px 0;">
                    <a href="/camiones" style="color: white; text-decoration: none; display: block; padding: 8px;">
                        🚚 Camiones
                    </a>
                </li>
                <li style="margin: 10px 0;">
                    <a href="/paquetes" style="color: white; text-decoration: none; display: block; padding: 8px;">
                        📦 Paquetes
                    </a>
                </li>
                <li style="margin: 10px 0;">
                    <a href="/estado-paquetes" style="color: white; text-decoration: none; display: block; padding: 8px; background: rgba(255,255,255,0.1);">
                        🏷️ Estados Paquetes
                    </a>
                </li>
                <li style="margin: 10px 0;">
                    <a href="/tipo-mercancia" style="color: white; text-decoration: none; display: block; padding: 8px;">
                        🏷️ Tipo Mercancía
                    </a>
                </li>
                <li style="margin: 10px 0;">
                    <a href="/detalle-paquetes" style="color: white; text-decoration: none; display: block; padding: 8px;">
                        📋 Detalle Paquetes
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Contenido Principal -->
    <div class="main-content">
        <!-- Mensajes de sesión -->
        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 12px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                ✅ {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                ❌ {{ session('error') }}
            </div>
        @endif

        <!-- Contenido de la vista -->
        @yield('content')
    </div>

    <!-- Bootstrap JS (opcional, para funcionalidades) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Scripts adicionales -->
    @stack('scripts')
</body>
</html>

