<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Camion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CamionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $camiones = Camion::with(['camionero'])->get();
        return response()->json($camiones);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'placa' => 'required|string|max:20|unique:camiones',
            'modelo' => 'required|string|max:100',
            'capacidad' => 'required|numeric',
            'camionero_id' => 'nullable|exists:camioneros,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $camion = Camion::create($request->all());

        return response()->json([
            'message' => 'Camión creado exitosamente',
            'data' => $camion
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $camion = Camion::with(['camionero', 'paquetes'])->find($id);

        if (!$camion) {
            return response()->json(['message' => 'Camión no encontrado'], 404);
        }

        return response()->json($camion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $camion = Camion::find($id);

        if (!$camion) {
            return response()->json(['message' => 'Camión no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'placa' => 'sometimes|required|string|max:20|unique:camiones,placa,' . $id,
            'modelo' => 'sometimes|required|string|max:100',
            'capacidad' => 'sometimes|required|numeric',
            'camionero_id' => 'nullable|exists:camioneros,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $camion->update($request->all());

        return response()->json([
            'message' => 'Camión actualizado exitosamente',
            'data' => $camion
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $camion = Camion::find($id);

        if (!$camion) {
            return response()->json(['message' => 'Camión no encontrado'], 404);
        }

        $camion->delete();

        return response()->json(['message' => 'Camión eliminado exitosamente']);
    }
}
