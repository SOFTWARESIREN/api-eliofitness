<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanAlimenticio;

class PlanAlimenticioController extends Controller
{
    public function index()
    {
        $planes = PlanAlimenticio::all();
        return response()->json($planes);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usuario_id' => 'required|exists:usuarios,usuario_id',
            'nombre' => 'required|string|max:100',
            'fecha_creacion' => 'nullable|date',
            'calorias_objetivo' => 'nullable|integer',
            'proteinas_objetivo' => 'nullable|integer',
            'carbohidratos_objetivo' => 'nullable|integer',
            'grasas_objetivo' => 'nullable|integer',
            'activo' => 'boolean'
        ]);

        $plan = PlanAlimenticio::create($validatedData);
        return response()->json($plan, 201);
    }

    public function show($id)
    {
        $plan = PlanAlimenticio::findOrFail($id);
        return response()->json($plan);
    }

    public function update(Request $request, $id)
    {
        $plan = PlanAlimenticio::findOrFail($id);
        
        $validatedData = $request->validate([
            'usuario_id' => 'exists:usuarios,usuario_id',
            'nombre' => 'string|max:100',
            'fecha_creacion' => 'nullable|date',
            'calorias_objetivo' => 'nullable|integer',
            'proteinas_objetivo' => 'nullable|integer',
            'carbohidratos_objetivo' => 'nullable|integer',
            'grasas_objetivo' => 'nullable|integer',
            'activo' => 'boolean'
        ]);

        $plan->update($validatedData);
        return response()->json($plan);
    }

    public function destroy($id)
    {
        $plan = PlanAlimenticio::findOrFail($id);
        $plan->delete();
        return response()->json(null, 204);
    }

    public function getByUsuario($usuario_id)
    {
        $planes = PlanAlimenticio::where('usuario_id', $usuario_id)
                                ->orderBy('fecha_creacion', 'desc')
                                ->get();
        return response()->json($planes);
    }
}
