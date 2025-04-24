<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;

class PerfilController extends Controller
{
    public function index()
    {
        $perfiles = Perfil::all();
        return response()->json($perfiles);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usuario_id' => 'required|exists:usuarios,usuario_id',
            'altura' => 'nullable|numeric|between:0,300',
            'objetivo_principal' => 'nullable|string|max:50',
            'nivel_actividad' => 'nullable|string|max:30',
            'condiciones_medicas' => 'nullable|string',
            'alergias' => 'nullable|string',
            'experiencia_ejercicio' => 'nullable|string|max:30'
        ]);

        $perfil = Perfil::create($validatedData);
        return response()->json($perfil, 201);
    }

    public function show($id)
    {
        $perfil = Perfil::findOrFail($id);
        return response()->json($perfil);
    }

    public function update(Request $request, $id)
    {
        $perfil = Perfil::findOrFail($id);
        
        $validatedData = $request->validate([
            'usuario_id' => 'exists:usuarios,usuario_id',
            'altura' => 'nullable|numeric|between:0,300',
            'objetivo_principal' => 'nullable|string|max:50',
            'nivel_actividad' => 'nullable|string|max:30',
            'condiciones_medicas' => 'nullable|string',
            'alergias' => 'nullable|string',
            'experiencia_ejercicio' => 'nullable|string|max:30'
        ]);

        $perfil->update($validatedData);
        return response()->json($perfil);
    }

    public function destroy($id)
    {
        $perfil = Perfil::findOrFail($id);
        $perfil->delete();
        return response()->json(null, 204);
    }
}
