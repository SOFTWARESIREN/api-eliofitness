<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedidaCorporal;

class MedidaCorporalController extends Controller
{
    public function index()
    {
        $medidas = MedidaCorporal::all();
        return response()->json($medidas);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usuario_id' => 'required|exists:usuarios,usuario_id',
            'fecha' => 'required|date',
            'peso' => 'nullable|numeric|between:0,999.99',
            'porcentaje_grasa' => 'nullable|numeric|between:0,100',
            'porcentaje_musculo' => 'nullable|numeric|between:0,100',
            'imc' => 'nullable|numeric|between:0,99.99',
            'circunferencia_cintura' => 'nullable|numeric|between:0,999.99',
            'circunferencia_cadera' => 'nullable|numeric|between:0,999.99',
            'circunferencia_brazos' => 'nullable|numeric|between:0,999.99',
            'circunferencia_piernas' => 'nullable|numeric|between:0,999.99',
            'notas' => 'nullable|string'
        ]);

        $medida = MedidaCorporal::create($validatedData);
        return response()->json($medida, 201);
    }

    public function show($id)
    {
        $medida = MedidaCorporal::findOrFail($id);
        return response()->json($medida);
    }

    public function update(Request $request, $id)
    {
        $medida = MedidaCorporal::findOrFail($id);
        
        $validatedData = $request->validate([
            'usuario_id' => 'exists:usuarios,usuario_id',
            'fecha' => 'date',
            'peso' => 'nullable|numeric|between:0,999.99',
            'porcentaje_grasa' => 'nullable|numeric|between:0,100',
            'porcentaje_musculo' => 'nullable|numeric|between:0,100',
            'imc' => 'nullable|numeric|between:0,99.99',
            'circunferencia_cintura' => 'nullable|numeric|between:0,999.99',
            'circunferencia_cadera' => 'nullable|numeric|between:0,999.99',
            'circunferencia_brazos' => 'nullable|numeric|between:0,999.99',
            'circunferencia_piernas' => 'nullable|numeric|between:0,999.99',
            'notas' => 'nullable|string'
        ]);

        $medida->update($validatedData);
        return response()->json($medida);
    }

    public function destroy($id)
    {
        $medida = MedidaCorporal::findOrFail($id);
        $medida->delete();
        return response()->json(null, 204);
    }

    public function getByUsuario($usuario_id)
    {
        $medidas = MedidaCorporal::where('usuario_id', $usuario_id)
                                ->orderBy('fecha', 'desc')
                                ->get();
        return response()->json($medidas);
    }
}
