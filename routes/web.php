<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CamioneroController;
use App\Http\Controllers\CamionController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\TipoMercanciaController;
use App\Http\Controllers\DetallePaqueteController;
use App\Http\Controllers\EstadoPaqueteController;

// Ruta PÚBLICA para visitantes (sin login)
Route::get('/', function () {
    return view('home'); // Página de bienvenida pública
});

// Ruta de prueba simple (pública)
Route::get('/test-simple', function() {
    return 'Laravel funciona!';
});

// Rutas de autenticación (login/register)
Auth::routes();

// 🔒 COMENTAR ESTO PARA HACER RUTAS PÚBLICAS TEMPORALMENTE
// Route::middleware(['auth'])->group(function () {
    // Dashboard principal después del login
    Route::get('/home', function() {
        return view('dashboard');
    })->name('home');
    
    // CRUDs protegidos
    Route::resource('camioneros', CamioneroController::class);
    Route::resource('camiones', CamionController::class);
    Route::resource('paquetes', PaqueteController::class);
    Route::resource('tipo-mercancia', TipoMercanciaController::class);
    Route::resource('detalle-paquetes', DetallePaqueteController::class);
    Route::resource('estado-paquetes', EstadoPaqueteController::class); // Nueva ruta para EstadoPaquete
// }); // <-- ESTE CIERRE TAMBIÉN VA COMENTADO