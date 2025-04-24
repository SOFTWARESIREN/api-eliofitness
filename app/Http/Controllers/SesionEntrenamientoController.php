<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SesionEntrenamiento;

class SesionEntrenamientoController extends Controller
{
    public function index()
    {
        $sesiones = SesionEntrenamiento::all();
        return response()->json($sesiones);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usuario_id' => 'required|exists:usuarios,usuario_id',
            'entrenador_id' => 'required|exists:empleados,empleado_id',
            'fecha' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'tipo' => 'nullable|string|max:50',
            'estado' => 'required|string|in:programada,completada,cancelada',
            'notas' => 'nullable|string'
        ]);

        $sesion = SesionEntrenamiento::create($validatedData);
        return response()->json($sesion, 201);
    }

    public function show($id)
    {
        $sesion = SesionEntrenamiento::findOrFail($id);
        return response()->json($sesion);
    }

    public function update(Request $request, $id)
    {
        $sesion = SesionEntrenamiento::findOrFail($id);
        
        $validatedData = $request->validate([
            'usuario_id' => 'exists:usuarios,usuario_id',
            'entrenador_id' => 'exists:empleados,empleado_id',
            'fecha' => 'date',
            'hora_inicio' => 'date_format:H:i',
            'hora_fin' => 'date_format:H:i|after:hora_inicio',
            'tipo' => 'nullable|string|max:50',
            'estado' => 'string|in:programada,completada,cancelada',
            'notas' => 'nullable|string'
        ]);

        $sesion->update($validatedData);
        return response()->json($sesion);
    }

    public function destroy($id)
    {
        $sesion = SesionEntrenamiento::findOrFail($id);
        $sesion->delete();
        return response()->json(null, 204);
    }

    public function getByUsuario($usuario_id)
    {
        $sesiones = SesionEntrenamiento::where('usuario_id', $usuario_id)
                                      ->orderBy('fecha', 'desc')
                                      ->orderBy('hora_inicio')
                                      ->get();
        return response()->json($sesiones);
    }

    public function getByEntrenador($entrenador_id)
    {
        $sesiones = SesionEntrenamiento::where('entrenador_id', $entrenador_id)
                                      ->orderBy('fecha', 'desc')
                                      ->orderBy('hora_inicio')
                                      ->get();
        return response()->json($sesiones);
    }
}
