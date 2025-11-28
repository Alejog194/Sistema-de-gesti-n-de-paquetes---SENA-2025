<?php

namespace App\Http\Controllers;

use App\Models\DetallePaquete;
use App\Models\Paquete;
use App\Models\TipoMercancia;
use Illuminate\Http\Request;

class DetallePaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detallePaquetes = DetallePaquete::with(['paquete', 'tipoMercancia'])->get();
        return view('detalle_paquete.index', compact('detallePaquetes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paquetes = Paquete::all();
        $tiposMercancia = TipoMercancia::all();
        return view('detalle_paquete.create', compact('paquetes', 'tiposMercancia'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paquete_id' => 'required|exists:paquetes,id',
            'tipo_mercancia_id' => 'required|exists:tipo_mercancia,id',
            'dimension' => 'required|string|max:45',
            'peso' => 'required|string|max:45',
            'fecha_entrega' => 'required|date'
        ]);

        DetallePaquete::create($request->all());

        return redirect()->route('detalle-paquete.index')
            ->with('success', 'Detalle de paquete creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetallePaquete $detallePaquete)
    {
        return view('detalle_paquete.show', compact('detallePaquete'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetallePaquete $detallePaquete)
    {
        $paquetes = Paquete::all();
        $tiposMercancia = TipoMercancia::all();
        return view('detalle_paquete.edit', compact('detallePaquete', 'paquetes', 'tiposMercancia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetallePaquete $detallePaquete)
    {
        $request->validate([
            'paquete_id' => 'required|exists:paquetes,id',
            'tipo_mercancia_id' => 'required|exists:tipo_mercancia,id',
            'dimension' => 'required|string|max:45',
            'peso' => 'required|string|max:45',
            'fecha_entrega' => 'required|date'
        ]);

        $detallePaquete->update($request->all());

        return redirect()->route('detalle-paquete.index')
            ->with('success', 'Detalle de paquete actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetallePaquete $detallePaquete)
    {
        $detallePaquete->delete();

        return redirect()->route('detalle-paquete.index')
            ->with('success', 'Detalle de paquete eliminado exitosamente.');
    }
}
