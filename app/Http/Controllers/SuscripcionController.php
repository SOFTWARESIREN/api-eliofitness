<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suscripcion;

class SuscripcionController extends Controller
{
    public function index()
    {
        $suscripciones = Suscripcion::all();
        return response()->json($suscripciones);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usuario_id' => 'required|exists:usuarios,usuario_id',
            'membresia_id' => 'required|exists:membresias,membresia_id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'estado' => 'required|string|in:activa,cancelada,pendiente',
            'metodo_pago' => 'nullable|string|max:50',
            'renovacion_automatica' => 'boolean'
        ]);

        $suscripcion = Suscripcion::create($validatedData);
        return response()->json($suscripcion, 201);
    }

    public function show($id)
    {
        $suscripcion = Suscripcion::findOrFail($id);
        return response()->json($suscripcion);
    }

    public function update(Request $request, $id)
    {
        $suscripcion = Suscripcion::findOrFail($id);
        
        $validatedData = $request->validate([
            'usuario_id' => 'exists:usuarios,usuario_id',
            'membresia_id' => 'exists:membresias,membresia_id',
            'fecha_inicio' => 'date',
            'fecha_fin' => 'date|after:fecha_inicio',
            'estado' => 'string|in:activa,cancelada,pendiente',
            'metodo_pago' => 'nullable|string|max:50',
            'renovacion_automatica' => 'boolean'
        ]);

        $suscripcion->update($validatedData);
        return response()->json($suscripcion);
    }

    public function destroy($id)
    {
        $suscripcion = Suscripcion::findOrFail($id);
        $suscripcion->delete();
        return response()->json(null, 204);
    }

    public function getByUsuario($usuario_id)
    {
        $suscripciones = Suscripcion::where('usuario_id', $usuario_id)
                                   ->orderBy('fecha_inicio', 'desc')
                                   ->get();
        return response()->json($suscripciones);
    }
}
