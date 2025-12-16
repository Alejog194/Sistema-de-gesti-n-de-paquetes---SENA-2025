<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SenaDelivery - Plataforma de Entrega</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            display: flex;
            flex-direction: column;
        }

        .header {
            background: linear-gradient(to right, #0d6efd, #0a58ca);
            color: white;
            text-align: center;
            padding: 40px 20px;
        }

        .header h1 {
            font-size: 2.8rem;
            margin-bottom: 10px;
            font-weight: 800;
        }

        .header p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        .content {
            padding: 50px;
            text-align: center;
        }

        .welcome-text {
            font-size: 1.8rem;
            color: #0d6efd;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .subtitle {
            color: #666;
            margin-bottom: 40px;
            font-size: 1.1rem;
            line-height: 1.5;
        }

        .buttons-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .btn {
            padding: 18px 35px;
            font-size: 1.2rem;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            min-width: 220px;
            text-align: center;
        }

        .btn-login {
            background: linear-gradient(to right, #198754, #20c997);
            color: white;
            box-shadow: 0 5px 15px rgba(25, 135, 84, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(25, 135, 84, 0.4);
        }

        .btn-register {
            background: linear-gradient(to right, #0d6efd, #0a58ca);
            color: white;
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
        }

        .btn-register:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(13, 110, 253, 0.4);
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 50px;
            flex-wrap: wrap;
        }

        .feature {
            background: #f8fafc;
            padding: 25px;
            border-radius: 12px;
            width: 250px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border-top: 4px solid #0d6efd;
        }

        .feature h3 {
            color: #0a58ca;
            margin-bottom: 10px;
        }

        .feature p {
            color: #666;
            font-size: 0.95rem;
        }

        .footer {
            text-align: center;
            padding: 20px;
            color: #666;
            font-size: 0.9rem;
            border-top: 1px solid #eee;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .buttons-container {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 300px;
            }
            
            .content {
                padding: 30px 20px;
            }
            
            .header h1 {
                font-size: 2.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Bienvenido a SenaDelivery</h1>
            <p>Tu plataforma de entrega de paquetes confiable, rápida y segura</p>
        </div>

        <div class="content">
            <h2 class="welcome-text">¿Qué deseas hacer?</h2>
            <p class="subtitle">
                Accede a tu cuenta para gestionar tus envíos o regístrate para comenzar a utilizar nuestro servicio
            </p>

            <div class="buttons-container">
                <a href="{{ route('login') }}" class="btn btn-login">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="btn btn-register">Registro Usuario</a>
            </div>

            <div class="features">
                <div class="feature">
                    <h3>📦 Envíos Rápidos</h3>
                    <p>Entregamos tus paquetes en tiempo récord con seguimiento en tiempo real</p>
                </div>
                <div class="feature">
                    <h3>🔒 Seguridad Garantizada</h3>
                    <p>Tus envíos están protegidos con nuestro sistema de seguridad avanzado</p>
                </div>
                <div class="feature">
                    <h3>🚚 Camioneros Verificados</h3>
                    <p>Todos nuestros transportistas están validados y certificados</p>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>© 2025 SenaDelivery. Todos los derechos reservados.</p>
            <p>Contacto: info@senadelivery.com | Tel: +57 1 2345678</p>
        </div>
    </div>
</body>
</html>