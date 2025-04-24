<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rutina;

class RutinaController extends Controller
{
    public function index()
    {
        $rutinas = Rutina::all();
        return response()->json($rutinas);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usuario_id' => 'required|exists:usuarios,usuario_id',
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'fecha_creacion' => 'nullable|date',
            'nivel' => 'nullable|string|max:20',
            'activa' => 'boolean'
        ]);

        $rutina = Rutina::create($validatedData);
        return response()->json($rutina, 201);
    }

    public function show($id)
    {
        $rutina = Rutina::findOrFail($id);
        return response()->json($rutina);
    }

    public function update(Request $request, $id)
    {
        $rutina = Rutina::findOrFail($id);
        
        $validatedData = $request->validate([
            'usuario_id' => 'exists:usuarios,usuario_id',
            'nombre' => 'string|max:100',
            'descripcion' => 'nullable|string',
            'fecha_creacion' => 'nullable|date',
            'nivel' => 'nullable|string|max:20',
            'activa' => 'boolean'
        ]);

        $rutina->update($validatedData);
        return response()->json($rutina);
    }

    public function destroy($id)
    {
        $rutina = Rutina::findOrFail($id);
        $rutina->delete();
        return response()->json(null, 204);
    }

    public function getByUsuario($usuario_id)
    {
        $rutinas = Rutina::where('usuario_id', $usuario_id)
                        ->orderBy('fecha_creacion', 'desc')
                        ->get();
        return response()->json($rutinas);
    }
}
