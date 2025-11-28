<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CamioneroController;
use App\Http\Controllers\CamionController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\TipoMercanciaController;
use App\Http\Controllers\DetallePaqueteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// CRUD para camioneros
Route::resource('camioneros', CamioneroController::class);
Route::resource('camiones', CamionController::class)->parameters([
    'camiones' => 'camion'
]);
Route::resource('paquetes', PaqueteController::class);
Route::resource('tipo-mercancia', TipoMercanciaController::class);
Route::resource('detalle-paquete', DetallePaqueteController::class);
