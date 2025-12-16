<?php

namespace App\Http\Controllers;

use App\Models\EstadoPaquete;
use Illuminate\Http\Request;

class EstadoPaqueteController extends Controller
{
    public function index()
    {
        $estados = EstadoPaquete::paginate(10);
        return view('estados-paquete.index', compact('estados'));
    }

    public function create()
    {
        return view('estados-paquete.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'estado' => 'required|string|max:45|unique:estados_paquetes,estado',
        ]);

        EstadoPaquete::create($request->all());

        return redirect()->route('estados-paquetes.index')
            ->with('success', 'Estado de paquete creado exitosamente.');
    }

    public function show(EstadoPaquete $estadoPaquete)
    {
        return view('estados-paquete.show', compact('estadoPaquete'));
    }

    public function edit(EstadoPaquete $estadoPaquete)
    {
        return view('estados-paquete.edit', compact('estadoPaquete'));
    }

    public function update(Request $request, EstadoPaquete $estadoPaquete)
    {
        $request->validate([
            'estado' => 'required|string|max:45|unique:estados_paquetes,estado,' . $estadoPaquete->id,
        ]);

        $estadoPaquete->update($request->all());

        return redirect()->route('estados-paquetes.index')
            ->with('success', 'Estado de paquete actualizado exitosamente.');
    }

    public function destroy(EstadoPaquete $estadoPaquete)
    {
        $estadoPaquete->delete();

        return redirect()->route('estados-paquetes.index')
            ->with('success', 'Estado de paquete eliminado exitosamente.');
    }
}
