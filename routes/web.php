<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CamioneroController;
use App\Http\Controllers\CamionController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\TipoMercanciaController;
use App\Http\Controllers\DetallePaqueteController;
use App\Http\Controllers\EstadoPaqueteController;
use App\Http\Controllers\DashboardController;

// ============================================
// 1. PÁGINA PÚBLICA (para visitantes sin login)
// ============================================
Route::get('/', function () {
    return view('welcome');
});

// ============================================
// 2. RUTAS DE AUTENTICACIÓN (públicas)
// ============================================
Auth::routes();

// ============================================
// 3. RUTAS PROTEGIDAS (requieren login)
// ============================================
Route::middleware(['auth'])->group(function () {
    
    // Dashboard principal (después de login) - PARA TODOS
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    
    // ============================================
    // 4. RUTAS SOLO PARA ADMINISTRADORES
    // ============================================
    Route::middleware(['admin'])->group(function () {
        // Dashboard de administrador
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        
        // Gestión de usuarios (solo admin)
        Route::get('/admin/usuarios', function () {
            return view('admin.usuarios');
        })->name('admin.usuarios');
        
        // Recursos para administradores
        Route::resource('camioneros', CamioneroController::class);
        Route::resource('camiones', CamionController::class);
        Route::resource('tipos-mercancia', TipoMercanciaController::class);
        Route::resource('detalles-paquetes', DetallePaqueteController::class);
        Route::resource('estados-paquetes', EstadoPaqueteController::class);
        
        // Ruta de prueba para administradores
        Route::get('/admin/test', function () {
            return '✅ Esta es una ruta solo para administradores';
        })->name('admin.test');
    });
    
    // ============================================
    // 5. RUTAS PARA USUARIOS NORMALES (autenticados)
    // ============================================
    // Usuarios pueden ver sus paquetes
    Route::get('/mis-paquetes', [PaqueteController::class, 'misPaquetes'])->name('paquetes.mis');
    Route::resource('paquetes', PaqueteController::class)->only(['index', 'show', 'create', 'store']);
    
    // Perfil de usuario
    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');
    
    // Logout personalizado
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
});