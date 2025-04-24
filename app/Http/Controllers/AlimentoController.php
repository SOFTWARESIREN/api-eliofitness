<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alimento;

class AlimentoController extends Controller
{
    public function index()
    {
        $alimentos = Alimento::all();
        return response()->json($alimentos);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'categoria' => 'nullable|string|max:50',
            'calorias' => 'nullable|integer',
            'proteinas' => 'nullable|numeric|between:0,999.99',
            'carbohidratos' => 'nullable|numeric|between:0,999.99',
            'grasas' => 'nullable|numeric|between:0,999.99',
            'fibra' => 'nullable|numeric|between:0,999.99',
            'azucares' => 'nullable|numeric|between:0,999.99',
            'sodio' => 'nullable|numeric|between:0,999.99',
            'imagen_url' => 'nullable|string|max:255'
        ]);

        $alimento = Alimento::create($validatedData);
        return response()->json($alimento, 201);
    }

    public function show($id)
    {
        $alimento = Alimento::findOrFail($id);
        return response()->json($alimento);
    }

    public function update(Request $request, $id)
    {
        $alimento = Alimento::findOrFail($id);
        
        $validatedData = $request->validate([
            'nombre' => 'string|max:100',
            'categoria' => 'nullable|string|max:50',
            'calorias' => 'nullable|integer',
            'proteinas' => 'nullable|numeric|between:0,999.99',
            'carbohidratos' => 'nullable|numeric|between:0,999.99',
            'grasas' => 'nullable|numeric|between:0,999.99',
            'fibra' => 'nullable|numeric|between:0,999.99',
            'azucares' => 'nullable|numeric|between:0,999.99',
            'sodio' => 'nullable|numeric|between:0,999.99',
            'imagen_url' => 'nullable|string|max:255'
        ]);

        $alimento->update($validatedData);
        return response()->json($alimento);
    }

    public function destroy($id)
    {
        $alimento = Alimento::findOrFail($id);
        $alimento->delete();
        return response()->json(null, 204);
    }
}
