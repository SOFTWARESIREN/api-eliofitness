<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::all();
        return response()->json($pagos);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'suscripcion_id' => 'required|exists:suscripciones_usuario,suscripcion_id',
            'monto' => 'required|numeric|min:0',
            'fecha' => 'required|date',
            'metodo' => 'nullable|string|max:50',
            'estado' => 'required|string|in:completado,pendiente,fallido',
            'referencia' => 'nullable|string|max:100'
        ]);

        $pago = Pago::create($validatedData);
        return response()->json($pago, 201);
    }

    public function show($id)
    {
        $pago = Pago::findOrFail($id);
        return response()->json($pago);
    }

    public function update(Request $request, $id)
    {
        $pago = Pago::findOrFail($id);
        
        $validatedData = $request->validate([
            'suscripcion_id' => 'exists:suscripciones_usuario,suscripcion_id',
            'monto' => 'numeric|min:0',
            'fecha' => 'date',
            'metodo' => 'nullable|string|max:50',
            'estado' => 'string|in:completado,pendiente,fallido',
            'referencia' => 'nullable|string|max:100'
        ]);

        $pago->update($validatedData);
        return response()->json($pago);
    }

    public function getBySuscripcion($suscripcion_id)
    {
        $pagos = Pago::where('suscripcion_id', $suscripcion_id)
                     ->orderBy('fecha', 'desc')
                     ->get();
        return response()->json($pagos);
    }
}
