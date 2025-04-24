<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comida;

class ComidaController extends Controller
{
    public function index()
    {
        $comidas = Comida::all();
        return response()->json($comidas);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'plan_id' => 'required|exists:planes_alimenticios,plan_id',
            'nombre' => 'required|string|max:50',
            'hora' => 'nullable|date_format:H:i'
        ]);

        $comida = Comida::create($validatedData);
        return response()->json($comida, 201);
    }

    public function show($id)
    {
        $comida = Comida::findOrFail($id);
        return response()->json($comida);
    }

    public function update(Request $request, $id)
    {
        $comida = Comida::findOrFail($id);
        
        $validatedData = $request->validate([
            'plan_id' => 'exists:planes_alimenticios,plan_id',
            'nombre' => 'string|max:50',
            'hora' => 'nullable|date_format:H:i'
        ]);

        $comida->update($validatedData);
        return response()->json($comida);
    }

    public function destroy($id)
    {
        $comida = Comida::findOrFail($id);
        $comida->delete();
        return response()->json(null, 204);
    }
}
