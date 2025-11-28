<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Camionero;

class CamioneroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $camioneros = Camionero ::all();
        return view('camioneros.index', compact('camioneros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('camioneros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'documento' => 'required|string|max:20|unique:camioneros,',
            'nombre'    => 'required|string|max:255',
            'apellido'  => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'licencia'  => 'required|string|max:20',
            'telefono'  => 'required|string|max:20',
            'email'     => 'nullable|email|max:255',
            'direccion' => 'nullable|string|max:500'
        ]);
        
        camionero::create($request->all());

        return redirect()->route('camioneros.index')
            ->with('success', 'Camionero creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Camionero $camionero)
    {
        return view('camioneros.show', compact('camionero'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Camionero $camionero)
    {   
        return view ('camioneros.edit', compact('camionero'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Camionero $camionero)
    {
        $request->validate([
            'nombre'    => 'required|string|max:255',
            'telefono'  => 'required|string|max:20',
            'email'     => 'nullable|email|max:255',
            'direccion' => 'nullable|string|max:500'
        ]);

        $camionero->update($request->all());

        return redirect()->route('camioneros.index')
            ->with('success', 'Camionero actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Camionero $camionero)
    {
        $camionero->delete();

        return redirect()->route('camioneros.index')
            ->with('success', 'Camionero eliminado exitosamente.');
    }
}
