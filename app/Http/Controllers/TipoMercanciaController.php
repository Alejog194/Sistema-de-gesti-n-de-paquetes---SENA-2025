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
            'tipo' => 'required|string|max:255|unique:tipo_mercancia'
        ]);

        TipoMercancia::create($request->all());

        return redirect()->route('tipo-mercancia.index')
            ->with('success', 'Tipo de mercancía creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoMercancia $tipoMercanium)
    {
        return view('tipo_mercancia.show', compact('tipoMercanium'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoMercancia $tipoMercanium)
    {
        return view('tipo_mercancia.edit', compact('tipoMercanium'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoMercancia $tipoMercanium)
    {
        $request->validate([
            'tipo' => 'required|string|max:255|unique:tipo_mercancia,tipo,' . $tipoMercanium->id
        ]);

        $tipoMercanium->update($request->all());

        return redirect()->route('tipo-mercancia.index')
            ->with('success', 'Tipo de mercancía actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoMercancia $tipoMercanium)
    {
        $tipoMercanium->delete();

        return redirect()->route('tipo-mercancia.index')
            ->with('success', 'Tipo de mercancía eliminado exitosamente.');
    }
}
