<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParticipacionReto;

class ParticipacionRetoController extends Controller
{
    public function index()
    {
        $participaciones = ParticipacionReto::all();
        return response()->json($participaciones);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reto_id' => 'required|exists:retos,reto_id',
            'usuario_id' => 'required|exists:usuarios,usuario_id',
            'fecha_union' => 'required|date',
            'estado' => 'required|string|in:activo,completado,abandonado',
            'progreso' => 'nullable|numeric|between:0,100'
        ]);

        $participacion = ParticipacionReto::create($validatedData);
        return response()->json($participacion, 201);
    }

    public function show($id)
    {
        $participacion = ParticipacionReto::findOrFail($id);
        return response()->json($participacion);
    }

    public function update(Request $request, $id)
    {
        $participacion = ParticipacionReto::findOrFail($id);
        
        $validatedData = $request->validate([
            'reto_id' => 'exists:retos,reto_id',
            'usuario_id' => 'exists:usuarios,usuario_id',
            'fecha_union' => 'date',
            'estado' => 'string|in:activo,completado,abandonado',
            'progreso' => 'nullable|numeric|between:0,100'
        ]);

        $participacion->update($validatedData);
        return response()->json($participacion);
    }

    public function destroy($id)
    {
        $participacion = ParticipacionReto::findOrFail($id);
        $participacion->delete();
        return response()->json(null, 204);
    }

    public function getByUsuario($usuario_id)
    {
        $participaciones = ParticipacionReto::where('usuario_id', $usuario_id)
                                          ->orderBy('fecha_union', 'desc')
                                          ->get();
        return response()->json($participaciones);
    }

    public function getByReto($reto_id)
    {
        $participaciones = ParticipacionReto::where('reto_id', $reto_id)
                                          ->orderBy('fecha_union', 'desc')
                                          ->get();
        return response()->json($participaciones);
    }
}
