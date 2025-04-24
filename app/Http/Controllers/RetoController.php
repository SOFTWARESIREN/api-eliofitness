<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reto;

class RetoController extends Controller
{
    public function index()
    {
        $retos = Reto::all();
        return response()->json($retos);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'objetivo' => 'nullable|string',
            'recompensa' => 'nullable|string',
            'imagen_url' => 'nullable|string|max:255',
            'activo' => 'boolean'
        ]);

        $reto = Reto::create($validatedData);
        return response()->json($reto, 201);
    }

    public function show($id)
    {
        $reto = Reto::findOrFail($id);
        return response()->json($reto);
    }

    public function update(Request $request, $id)
    {
        $reto = Reto::findOrFail($id);
        
        $validatedData = $request->validate([
            'nombre' => 'string|max:100',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'date',
            'fecha_fin' => 'date|after:fecha_inicio',
            'objetivo' => 'nullable|string',
            'recompensa' => 'nullable|string',
            'imagen_url' => 'nullable|string|max:255',
            'activo' => 'boolean'
        ]);

        $reto->update($validatedData);
        return response()->json($reto);
    }

    public function destroy($id)
    {
        $reto = Reto::findOrFail($id);
        $reto->delete();
        return response()->json(null, 204);
    }

    public function getActivos()
    {
        $retos = Reto::where('activo', true)
                     ->where('fecha_fin', '>=', now())
                     ->orderBy('fecha_inicio')
                     ->get();
        return response()->json($retos);
    }
}
