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
        $tiposMercancia = TipoMercancia::all();
        return view('tipos-mercancia.index', compact('tiposMercancia'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipos-mercancia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|max:100|unique:tipo_mercancia,tipo',
        ]);

        TipoMercancia::create([
            'tipo' => $request->tipo,
        ]);

        return redirect()->route('tipos-mercancia.index')  // CAMBIADO: tipo-mercancia → tipos-mercancia
            ->with('success', 'Tipo de mercancía creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoMercancia $tipoMercancia)
    {
        return view('tipos-mercancia.show', compact('tipoMercancia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoMercancia $tipoMercancia)
    {
        return view('tipos-mercancia.edit', compact('tipoMercancia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoMercancia $tipoMercancia)
    {
        $request->validate([
            'tipo' => 'required|string|max:100|unique:tipo_mercancia,tipo,' . $tipoMercancia->id,
        ]);

        $tipoMercancia->update([
            'tipo' => $request->tipo,
        ]);

        return redirect()->route('tipos-mercancia.index')  // CAMBIADO: tipo-mercancia → tipos-mercancia
            ->with('success', 'Tipo de mercancía actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoMercancia $tipoMercancia) //TipoMercancia es el modelo y $tipoMercancia es la variable que recibe el objeto a eliminar.
    {
        $tipoMercancia->delete();

        return redirect()->route('tipos-mercancia.index')  // CAMBIADO: tipo-mercancia → tipos-mercancia
            ->with('success', 'Tipo de mercancía eliminado exitosamente.');
    }
}