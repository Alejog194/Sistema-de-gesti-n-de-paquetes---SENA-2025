<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar que el usuario esté autenticado y sea administrador
        if (auth()->check() && auth()->user()->isAdmin()) {
            return $next($request);
        }

        // Si es una petición API o espera respuesta JSON
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json([
                'success' => false,
                'message' => 'Acceso no autorizado. Se requiere rol de administrador.',
                'error' => 'Forbidden'
            ], 403);
        }

        // Si es una petición web normal, redirigir al inicio con mensaje de error
        return redirect('/')->with('error', 'Acceso restringido. Solo administradores pueden acceder.');
    }
}