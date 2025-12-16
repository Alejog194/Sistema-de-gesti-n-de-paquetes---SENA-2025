<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TipoMercancia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoMercanciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = TipoMercancia::with(['paquetes'])->get();
        return response()->json($tipos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:100|unique:tipos_mercancia',
            'descripcion' => 'nullable|string|max:500',
            'requiere_refrigeracion' => 'boolean',
            'manejo_especial' => 'boolean',
            'seguro_obligatorio' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $tipo = TipoMercancia::create($request->all());

        return response()->json([
            'message' => 'Tipo de mercancía creado exitosamente',
            'data' => $tipo
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tipo = TipoMercancia::with(['paquetes'])->find($id);

        if (!$tipo) {
            return response()->json(['message' => 'Tipo de mercancía no encontrado'], 404);
        }

        return response()->json($tipo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tipo = TipoMercancia::find($id);

        if (!$tipo) {
            return response()->json(['message' => 'Tipo de mercancía no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'sometimes|required|string|max:100|unique:tipos_mercancia,nombre,' . $id,
            'descripcion' => 'nullable|string|max:500',
            'requiere_refrigeracion' => 'boolean',
            'manejo_especial' => 'boolean',
            'seguro_obligatorio' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $tipo->update($request->all());

        return response()->json([
            'message' => 'Tipo de mercancía actualizado exitosamente',
            'data' => $tipo
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tipo = TipoMercancia::find($id);

        if (!$tipo) {
            return response()->json(['message' => 'Tipo de mercancía no encontrado'], 404);
        }

        $tipo->delete();

        return response()->json(['message' => 'Tipo de mercancía eliminado exitosamente']);
    }
}
