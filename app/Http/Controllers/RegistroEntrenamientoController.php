<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroEntrenamiento;

class RegistroEntrenamientoController extends Controller
{
    public function index()
    {
        $registros = RegistroEntrenamiento::all();
        return response()->json($registros);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usuario_id' => 'required|exists:usuarios,usuario_id',
            'rutina_id' => 'nullable|exists:rutinas,rutina_id',
            'dia_id' => 'nullable|exists:dias_rutina,dia_id',
            'fecha' => 'required|date',
            'hora_inicio' => 'nullable|date_format:H:i',
            'hora_fin' => 'nullable|date_format:H:i|after:hora_inicio',
            'notas' => 'nullable|string',
            'valoracion' => 'nullable|integer|between:1,5'
        ]);

        $registro = RegistroEntrenamiento::create($validatedData);
        return response()->json($registro, 201);
    }

    public function show($id)
    {
        $registro = RegistroEntrenamiento::findOrFail($id);
        return response()->json($registro);
    }

    public function update(Request $request, $id)
    {
        $registro = RegistroEntrenamiento::findOrFail($id);
        
        $validatedData = $request->validate([
            'usuario_id' => 'exists:usuarios,usuario_id',
            'rutina_id' => 'nullable|exists:rutinas,rutina_id',
            'dia_id' => 'nullable|exists:dias_rutina,dia_id',
            'fecha' => 'date',
            'hora_inicio' => 'nullable|date_format:H:i',
            'hora_fin' => 'nullable|date_format:H:i|after:hora_inicio',
            'notas' => 'nullable|string',
            'valoracion' => 'nullable|integer|between:1,5'
        ]);

        $registro->update($validatedData);
        return response()->json($registro);
    }

    public function destroy($id)
    {
        $registro = RegistroEntrenamiento::findOrFail($id);
        $registro->delete();
        return response()->json(null, 204);
    }

    public function getByUsuario($usuario_id)
    {
        $registros = RegistroEntrenamiento::where('usuario_id', $usuario_id)
                                        ->orderBy('fecha', 'desc')
                                        ->get();
        return response()->json($registros);
    }
}
