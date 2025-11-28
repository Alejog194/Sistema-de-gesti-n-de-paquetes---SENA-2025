<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use App\Models\Camionero;
use App\Models\EstadoPaquete;
use Illuminate\Http\Request;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paquetes = Paquete::with(['camionero', 'estado'])->get();
        return view('paquetes.index', compact('paquetes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $camioneros = Camionero::all();
        $estados = EstadoPaquete::all();
        return view('paquetes.create', compact('camioneros', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'direccion' => 'required|string|max:255',
            'camionero_id' => 'required|exists:camioneros,id',
            'estado_id' => 'required|exists:estados_paquetes,id'
        ]);

        Paquete::create($request->all());

        return redirect()->route('paquetes.index')
            ->with('success', 'Paquete creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paquete $paquete)
    {
        return view('paquetes.show', compact('paquete'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paquete $paquete)
    {
        $camioneros = Camionero::all();
        $estados = EstadoPaquete::all();
        return view('paquetes.edit', compact('paquete', 'camioneros', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paquete $paquete)
    {
        $request->validate([
            'direccion' => 'required|string|max:255',
            'camionero_id' => 'required|exists:camioneros,id',
            'estado_id' => 'required|exists:estados_paquetes,id'
        ]);

        $paquete->update($request->all());

        return redirect()->route('paquetes.index')
            ->with('success', 'Paquete actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paquete $paquete)
    {
        $paquete->delete();

        return redirect()->route('paquetes.index')
            ->with('success', 'Paquete eliminado exitosamente.');
    }
}
