<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HorarioEntrenador;

class HorarioEntrenadorController extends Controller
{
    public function index()
    {
        $horarios = HorarioEntrenador::all();
        return response()->json($horarios);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'empleado_id' => 'required|exists:empleados,empleado_id',
            'dia_semana' => 'required|string|max:10',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio'
        ]);

        $horario = HorarioEntrenador::create($validatedData);
        return response()->json($horario, 201);
    }

    public function show($id)
    {
        $horario = HorarioEntrenador::findOrFail($id);
        return response()->json($horario);
    }

    public function update(Request $request, $id)
    {
        $horario = HorarioEntrenador::findOrFail($id);
        
        $validatedData = $request->validate([
            'empleado_id' => 'exists:empleados,empleado_id',
            'dia_semana' => 'string|max:10',
            'hora_inicio' => 'date_format:H:i',
            'hora_fin' => 'date_format:H:i|after:hora_inicio'
        ]);

        $horario->update($validatedData);
        return response()->json($horario);
    }

    public function destroy($id)
    {
        $horario = HorarioEntrenador::findOrFail($id);
        $horario->delete();
        return response()->json(null, 204);
    }

    public function getByEntrenador($empleado_id)
    {
        $horarios = HorarioEntrenador::where('empleado_id', $empleado_id)
                                    ->orderBy('dia_semana')
                                    ->orderBy('hora_inicio')
                                    ->get();
        return response()->json($horarios);
    }
}
