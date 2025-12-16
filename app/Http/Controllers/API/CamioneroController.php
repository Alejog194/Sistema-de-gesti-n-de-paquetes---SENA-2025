<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Camionero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CamioneroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $camioneros = Camionero::with(['camion', 'paquetes'])->get();
        return response()->json($camioneros);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'licencia' => 'required|string|max:50|unique:camioneros',
            'fecha_contratacion' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $camionero = Camionero::create($request->all());

        return response()->json([
            'message' => 'Camionero creado exitosamente',
            'data' => $camionero
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $camionero = Camionero::with(['camion', 'paquetes'])->find($id);

        if (!$camionero) {
            return response()->json(['message' => 'Camionero no encontrado'], 404);
        }

        return response()->json($camionero);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $camionero = Camionero::find($id);

        if (!$camionero) {
            return response()->json(['message' => 'Camionero no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'sometimes|required|string|max:100',
            'telefono' => 'sometimes|required|string|max:20',
            'direccion' => 'sometimes|required|string|max:255',
            'licencia' => 'sometimes|required|string|max:50|unique:camioneros,licencia,' . $id,
            'fecha_contratacion' => 'sometimes|required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $camionero->update($request->all());

        return response()->json([
            'message' => 'Camionero actualizado exitosamente',
            'data' => $camionero
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $camionero = Camionero::find($id);

        if (!$camionero) {
            return response()->json(['message' => 'Camionero no encontrado'], 404);
        }

        $camionero->delete();

        return response()->json(['message' => 'Camionero eliminado exitosamente']);
    }
}