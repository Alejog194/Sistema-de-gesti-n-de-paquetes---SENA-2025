<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paquetes = Paquete::with(['tipoMercancia', 'camionero', 'camion', 'estado'])->get();
        return response()->json([
            'success' => true,
            'data' => $paquetes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'camionero_id' => 'required|exists:camioneros,id',
            'estado_id' => 'required|exists:estados_paquetes,id',
            'tipo_mercancia_id' => 'nullable|exists:tipo_mercancia,id',
            'camion_id' => 'nullable|exists:camiones,id',
            'user_id' => 'nullable|exists:users,id',
            'direccion' => 'required|string|max:25', // Tu campo real
            // Campos adicionales si ya los agregaste en la migración
            'codigo' => 'nullable|string|max:50|unique:paquetes',
            'descripcion' => 'nullable|string|max:500',
            'peso' => 'nullable|numeric|min:0',
            'dimensiones' => 'nullable|string|max:100',
            'fecha_envio' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Si no viene código, generar uno automático
        $data = $request->all();
        if (empty($data['codigo'])) {
            $data['codigo'] = 'PKG-' . date('YmdHis') . '-' . rand(1000, 9999);
        }

        $paquete = Paquete::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Paquete creado exitosamente',
            'data' => $paquete->load(['tipoMercancia', 'camionero', 'camion', 'estado'])
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paquete = Paquete::with(['tipoMercancia', 'camionero', 'camion', 'estado'])->find($id);

        if (!$paquete) {
            return response()->json([
                'success' => false,
                'message' => 'Paquete no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $paquete
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $paquete = Paquete::find($id);

        if (!$paquete) {
            return response()->json([
                'success' => false,
                'message' => 'Paquete no encontrado'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'camionero_id' => 'sometimes|exists:camioneros,id',
            'estado_id' => 'sometimes|exists:estados_paquetes,id',
            'tipo_mercancia_id' => 'nullable|exists:tipo_mercancia,id',
            'camion_id' => 'nullable|exists:camiones,id',
            'user_id' => 'nullable|exists:users,id',
            'direccion' => 'sometimes|string|max:25',
            'codigo' => 'sometimes|string|max:50|unique:paquetes,codigo,' . $id,
            'descripcion' => 'nullable|string|max:500',
            'peso' => 'nullable|numeric|min:0',
            'dimensiones' => 'nullable|string|max:100',
            'fecha_envio' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $paquete->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Paquete actualizado exitosamente',
            'data' => $paquete->load(['tipoMercancia', 'camionero', 'camion', 'estado'])
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paquete = Paquete::find($id);

        if (!$paquete) {
            return response()->json([
                'success' => false,
                'message' => 'Paquete no encontrado'
            ], 404);
        }

        $paquete->delete();

        return response()->json([
            'success' => true,
            'message' => 'Paquete eliminado exitosamente'
        ]);
    }

    /**
     * Cambiar estado del paquete (usando estado_id en lugar de estado)
     */
    public function cambiarEstado(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'estado_id' => 'required|exists:estados_paquetes,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $paquete = Paquete::find($id);
        
        if (!$paquete) {
            return response()->json([
                'success' => false,
                'message' => 'Paquete no encontrado'
            ], 404);
        }

        $paquete->update(['estado_id' => $request->estado_id]);

        return response()->json([
            'success' => true,
            'message' => 'Estado actualizado exitosamente',
            'data' => $paquete->load('estado')
        ]);
    }
}