# 🚚 Sena Delivery - Sistema de Gestión de Paquetes

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql)
![Sanctum](https://img.shields.io/badge/Sanctum-Auth-FF2D20?style=for-the-badge&logo=laravel)
![API REST](https://img.shields.io/badge/API-REST-00C7B7?style=for-the-badge)

**Sistema completo de gestión logística para transporte de paquetes con autenticación dual (Web + API)**

[Características](#-características) • [Instalación](#-instalación) • [Documentación API](#-documentación-api) • [Estructura](#-estructura-del-proyecto) • [Despliegue](#-despliegue)

</div>

## 📋 Tabla de Contenidos

- [Descripción del Proyecto](#-descripción-del-proyecto)
- [Características](#-características)
- [Tecnologías Utilizadas](#-tecnologías-utilizadas)
- [Instalación](#-instalación)
- [Configuración](#-configuración)
- [Estructura del Proyecto](#-estructura-del-proyecto)
- [Documentación API](#-documentación-api)
- [Roles de Usuario](#-roles-de-usuario)
- [Base de Datos](#-base-de-datos)
- [Testing](#-testing)
- [Despliegue](#-despliegue)
- [Contribución](#-contribución)
- [Licencia](#-licencia)
- [Contacto](#-contacto)

## 🎯 Descripción del Proyecto

**Sena Delivery** es un sistema de gestión logística completo desarrollado con Laravel 10 que permite administrar el ciclo completo de transporte de paquetes, desde la creación hasta la entrega.

### 🎯 Objetivos Principales
- ✅ Gestión integral de paquetes y envíos
- ✅ Sistema de autenticación dual (Web + API)
- ✅ Control de acceso basado en roles (Admin/Usuario)
- ✅ API RESTful documentada
- ✅ Panel administrativo completo
- ✅ Seguridad con Laravel Sanctum

## ✨ Características

### 🔐 Autenticación y Seguridad
- **Autenticación dual**: Sesiones web + Tokens API (Sanctum)
- **Roles de usuario**: Administrador y Usuario normal
- **Middleware de protección**: Rutas protegidas por rol
- **Validación de datos**: Form Requests y reglas de negocio

### 📦 Gestión de Paquetes
- ✅ Creación, lectura, actualización y eliminación de paquetes
- ✅ Seguimiento de estados (creado, en tránsito, entregado, etc.)
- ✅ Gestión de tipos de mercancía
- ✅ Asignación a camiones y camioneros
- ✅ Detalles completos de envíos

### 👥 Gestión de Usuarios
- ✅ Registro y login de usuarios
- ✅ Perfiles de usuario
- ✅ Dashboard personalizado (Admin/Usuario)
- ✅ Gestión de usuarios (solo administradores)

### 🚚 Gestión Logística
- ✅ Control de camiones (vehículos)
- ✅ Gestión de camioneros (conductores)
- ✅ Estados de paquetes personalizables
- ✅ Tipos de mercancía configurables

### 🌐 API RESTful
- ✅ Endpoints documentados
- ✅ Respuestas JSON estandarizadas
- ✅ Paginación y filtros
- ✅ Manejo de errores consistente

## 🛠 Tecnologías Utilizadas

### Backend
- **PHP 8.1+** - Lenguaje de programación
- **Laravel 10.x** - Framework PHP
- **Laravel Sanctum** - Autenticación API
- **MySQL 8.0** - Base de datos
- **Composer** - Gestión de dependencias

### Frontend (Web)
- **Blade Templates** - Motor de plantillas
- **Bootstrap 5** - Framework CSS
- **JavaScript Vanilla** - Interactividad
- **Axios** - Cliente HTTP para API

### Herramientas de Desarrollo
- **PHPUnit** - Testing
- **Swagger/OpenAPI** - Documentación
- **Git** - Control de versiones
- **Docker** (opcional) - Contenedorización

## 🚀 Instalación

### Requisitos Previos
- PHP 8.1 o superior
- Composer 2.0 o superior
- MySQL 8.0 o superior
- Node.js 16+ (para assets frontend)
- Git

### Pasos de Instalación

1. **Clonar el repositorio**
```bash
git clone https://github.com/alejog194/sena-delivery.git
cd sena-delivery
