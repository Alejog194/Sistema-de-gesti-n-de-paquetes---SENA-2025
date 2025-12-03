<?php

namespace App\Http\Controllers;

use App\Models\Camion;
use Illuminate\Http\Request;

class CamionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $camiones = Camion::all();
        return view('camiones.index', compact('camiones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('camiones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|string|max:10|unique:camiones,placa',
            'modelo' => 'required|string|max:10',
        ]);

        Camion::create($request->all());

        return redirect()->route('camiones.index')
            ->with('success', 'Camión creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Camion $camion)
    {
        return view('camiones.show', compact('camion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Camion $camion)
    {
        return view('camiones.edit', compact('camion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Camion $camion)
    {
        $request->validate([
            'placa' => 'required|string|max:10|unique:camiones,placa,' . $camion->id,
            'modelo' => 'required|string|max:10',
        ]);

        $camion->update($request->all());

        return redirect()->route('camiones.index')
            ->with('success', 'Camión actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Camion $camion)
    {
        $camion->delete();

        return redirect()->route('camiones.index')
            ->with('success', 'Camión eliminado exitosamente.');
    }
}
