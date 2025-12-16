<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Paquete;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->role === 'admin') {
            // Dashboard para administrador
            $stats = [
                'camioneros' => \App\Models\Camionero::count(),
                'camiones' => \App\Models\Camion::count(),
                'paquetes' => \App\Models\Paquete::count(),
                'tipos_mercancia' => \App\Models\TipoMercancia::count(),
            ];
            
            return view('dashboard.admin', compact('stats'));
        } else {
            // Dashboard para usuario normal
            $misPaquetes = Paquete::where('user_id', $user->id)
                ->latest()
                ->take(5)
                ->get();
                
            $paquetesCount = Paquete::where('user_id', $user->id)->count();
            
            return view('dashboard.user', compact('misPaquetes', 'paquetesCount'));
        }
    }
}