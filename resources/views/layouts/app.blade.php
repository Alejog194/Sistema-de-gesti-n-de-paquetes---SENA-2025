<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sena-Delivery - @yield('title')</title>
    
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
            padding: 20px;
        }
        @media (max-width: 768px) {
            .sidebar {
                display: none;
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
        .user-badge {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: bold;
            margin-left: 8px;
        }
        .badge-admin {
            background-color: #dc3545;
            color: white;
        }
        .badge-user {
            background-color: #198754;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar Simple -->
    <nav class="navbar">
        <div class="container-fluid">
            <span style="font-size: 1.5rem; font-weight: bold;">
                🚚 Sena-Delivery
            </span>
            <div style="color: white;">
                {{-- ✅ CORREGIDO: Navbar dinámico --}}
                @auth
                    Bienvenido, {{ Auth::user()->name }}
                    <span class="user-badge {{ Auth::user()->role == 'admin' ? 'badge-admin' : 'badge-user' }}">
                        {{ Auth::user()->role == 'admin' ? 'ADMIN' : 'USUARIO' }}
                    </span>
                    | <a href="{{ route('logout') }}" 
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                         style="color: white; text-decoration: none;">
                        Cerrar Sesión
                    </a>
                @else
                    <a href="/login" style="color: white; text-decoration: none;">Iniciar Sesión</a>
                    | <a href="/register" style="color: white; text-decoration: none;">Registrarse</a>
                @endauth
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    {{-- ✅✅✅ CORREGIDO: Sidebar SOLO para usuarios logueados --}}
    @auth
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

                {{-- Menú para ADMINISTRADOR --}}
                @if(Auth::user()->role == 'admin')
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
                        <a href="/tipos-mercancia" style="color: white; text-decoration: none; display: block; padding: 8px;">
                            🏷️ Tipo Mercancía
                        </a>
                    </li>
                    <li style="margin: 10px 0;">
                        <a href="/detalles-paquete" style="color: white; text-decoration: none; display: block; padding: 8px;">
                            📋 Detalles Paquete
                        </a>
                    </li>
                    <li style="margin: 10px 0;">
                        <a href="/estados-paquete" style="color: white; text-decoration: none; display: block; padding: 8px; background: rgba(255,255,255,0.1);">
                            🏷️ Estados Paquete
                        </a>
                    </li>
                @else
                    {{-- Menú para USUARIO NORMAL --}}
                    <li style="margin: 10px 0;">
                        <a href="/paquetes/create" style="color: white; text-decoration: none; display: block; padding: 8px;">
                            📦 Nuevo Paquete
                        </a>
                    </li>
                    <li style="margin: 10px 0;">
                        <a href="/mis-paquetes" style="color: white; text-decoration: none; display: block; padding: 8px;">
                            📋 Mis Paquetes
                        </a>
                    </li>
                    <li style="margin: 10px 0;">
                        <a href="#" style="color: white; text-decoration: none; display: block; padding: 8px;">
                            📊 Seguimiento
                        </a>
                    </li>
                @endif

                {{-- Menú común para ADMIN y USUARIO --}}
                <li style="margin: 10px 0;">
                    <a href="/paquetes" style="color: white; text-decoration: none; display: block; padding: 8px;">
                        📦 Todos los Paquetes
                    </a>
                </li>

                {{-- Separador --}}
                <li style="border-top: 1px solid rgba(255,255,255,0.1); margin: 15px 0; padding: 0;"></li>

                {{-- Información del rol --}}
                <li style="margin: 10px 0; color: #aaa; font-size: 0.9rem; padding: 8px;">
                    @if(Auth::user()->role == 'admin')
                        <small>👑 Rol: Administrador<br>Tienes acceso completo al sistema</small>
                    @else
                        <small>👤 Rol: Usuario<br>Gestiona tus paquetes</small>
                    @endif
                </li>
            </ul>
        </div>
    </div>
    @endauth

    <!-- Contenido Principal -->
    {{-- ✅ CORREGIDO: Margen dinámico --}}
    <div class="main-content" style="@auth margin-left: 250px; @else margin-left: 0; @endauth">
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

