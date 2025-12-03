<?php

namespace App\Http\Controllers;

use App\Models\TipoMercancia;
use Illuminate\Http\Request;

class TipoMercanciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoMercancias = TipoMercancia::all();
        return view('tipo_mercancia.index', compact('tipoMercancias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipo_mercancia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|max:45|unique:tipo_mercancia,tipo',
        ]);

        TipoMercancia::create($request->all());

        return redirect()->route('tipo_mercancia.index')
            ->with('success', 'Tipo de mercancía creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoMercancia $tipoMercancia)
    {
        return view('tipo_mercancia.show', compact('tipoMercancia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoMercancia $tipoMercancia)
    {
        return view('tipo_mercancia.edit', compact('tipoMercancia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoMercancia $tipoMercancia)
    {
        $request->validate([
            'tipo' => 'required|string|max:45|unique:tipo_mercancia,tipo,' . $tipoMercancia->id,
        ]);

        $tipoMercancia->update($request->all());

        return redirect()->route('tipo_mercancia.index')
            ->with('success', 'Tipo de mercancía actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoMercancia $tipoMercancia)
    {
        $tipoMercancia->delete();

        return redirect()->route('tipo_mercancia.index')
            ->with('success', 'Tipo de mercancía eliminado exitosamente.');
    }
}