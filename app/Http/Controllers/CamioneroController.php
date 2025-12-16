<?php

namespace App\Http\Controllers;

use App\Models\Camionero;
use Illuminate\Http\Request;

class CamioneroController extends Controller
{
    /**
     * Display a listing of the resource (Web).
     */
    public function index()
    {
        $camioneros = Camionero::latest()->paginate(10);
        return view('camioneros.index', compact('camioneros'));
    }

    /**
     * Show the form for creating a new resource (Web).
     */
    public function create()
    {
        return view('camioneros.create');
    }

    /**
     * Store a newly created resource in storage (Web).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'nullable|email|unique:camioneros,email',
            'direccion' => 'nullable|string|max:255',
        ]);

        Camionero::create($validated);

        return redirect()->route('camioneros.index')
            ->with('success', 'Camionero creado exitosamente');
    }

    /**
     * Display the specified resource (Web).
     */
    public function show(Camionero $camionero)
    {
        return view('camioneros.show', compact('camionero'));
    }

    /**
     * Show the form for editing the specified resource (Web).
     */
    public function edit(Camionero $camionero)
    {
        return view('camioneros.edit', compact('camionero'));
    }

    /**
     * Update the specified resource in storage (Web).
     */
    public function update(Request $request, Camionero $camionero)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|unique:camioneros,email,' . $camionero->id,
            'direccion' => 'nullable|string|max:255',
        ]);

        $camionero->update($validated);

        return redirect()->route('camioneros.index')
            ->with('success', 'Camionero actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage (Web).
     */
    public function destroy(Camionero $camionero)
    {
        $camionero->delete();

        return redirect()->route('camioneros.index')
            ->with('success', 'Camionero eliminado exitosamente');
    }
}
