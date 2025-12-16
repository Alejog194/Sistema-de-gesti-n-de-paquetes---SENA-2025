<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// ✅ CORREGIR: Agregar use statements con namespace API
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CamioneroController;
use App\Http\Controllers\API\CamionController;
use App\Http\Controllers\API\PaqueteController;
use App\Http\Controllers\API\TipoMercanciaController;
use App\Http\Controllers\API\EstadoPaqueteController;
use App\Http\Controllers\API\DetallePaqueteController;
use App\Models\User;
use App\Models\Camionero;
use App\Models\Paquete;
use App\Models\Camion;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// RUTAS PÚBLICAS DE API
// ✅ CORREGIDO: Usar AuthController con namespace API
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// RUTAS PROTEGIDAS CON SANCTUM
Route::middleware('auth:sanctum')->group(function () {
    // ✅ CORREGIDO: Usar AuthController en lugar de closure
    // Información del usuario autenticado
    Route::get('/user', [AuthController::class, 'user']);
    
    // Logout
    // ✅ CORREGIDO: Usar AuthController con namespace API
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // ============================================
    // RUTAS SOLO PARA ADMINISTRADORES (API)
    // ============================================
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        // Dashboard de administrador
        Route::get('/dashboard', function() {
            return response()->json([
                'success' => true,
                'data' => [
                    'stats' => [
                        'total_users' => User::count(),
                        'total_camioneros' => Camionero::count(),
                        'total_paquetes' => Paquete::count(),
                        'total_camiones' => Camion::count(),
                    ],
                    'recent_users' => User::latest()->take(5)->get(['id', 'name', 'email', 'role', 'created_at']),
                    'recent_paquetes' => Paquete::with(['user', 'estado'])->latest()->take(5)->get(),
                ]
            ]);
        });
        
        // Gestión de usuarios (solo admin)
        Route::get('/users', function() {
            $users = User::select('id', 'name', 'email', 'role', 'created_at')
                ->orderBy('created_at', 'desc')
                ->get();
                
            return response()->json([
                'success' => true,
                'data' => ['users' => $users]
            ]);
        });
        
        // ✅ CORREGIDO: Usar controladores API
        Route::apiResource('/camioneros', CamioneroController::class);
        Route::apiResource('/camiones', CamionController::class);
        Route::apiResource('/paquetes', PaqueteController::class);
        Route::apiResource('/tipos-mercancia', TipoMercanciaController::class);
        Route::apiResource('/estados-paquetes', EstadoPaqueteController::class);
        Route::apiResource('/detalles-paquetes', DetallePaqueteController::class);
    });
    
    // ============================================
    // RUTAS PARA USUARIOS NORMALES (API)
    // ============================================
    Route::prefix('user')->group(function () {
        // Perfil del usuario
        Route::get('/profile', function(Request $request) {
            return response()->json([
                'success' => true,
                'data' => [
                    'user' => $request->user()->only('id', 'name', 'email', 'role', 'created_at')
                ]
            ]);
        });
        
        // Paquetes del usuario autenticado
        Route::get('/paquetes', function(Request $request) {
            $paquetes = $request->user()->paquetes()
                ->with(['camionero', 'estado', 'tipoMercancia', 'camion'])
                ->latest()
                ->get();
                
            return response()->json([
                'success' => true,
                'data' => ['paquetes' => $paquetes]
            ]);
        });
        
        // ✅ CORREGIDO: Usar PaqueteController API
        Route::post('/paquetes', [PaqueteController::class, 'store']);
        Route::get('/paquetes/{paquete}', [PaqueteController::class, 'show']);
        Route::put('/paquetes/{paquete}', [PaqueteController::class, 'update']);
    });
    
    // ============================================
    // RUTAS COMPARTIDAS (opcional)
    // ============================================
    // Si quieres que usuarios normales vean algunos recursos
    // Route::get('/camioneros', [CamioneroController::class, 'index'])->name('camioneros.index');
    // Route::get('/estados-paquetes', [EstadoPaqueteController::class, 'index']);
});

// Ruta de verificación
Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'API SenaDelivery funcionando',
        'timestamp' => now()
    ]);
});

// Ruta por defecto para API no encontrada
Route::fallback(function () {
    return response()->json([
        'success' => false,
        'message' => 'Ruta API no encontrada'
    ], 404);
}); 