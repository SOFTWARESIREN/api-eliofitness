<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ejercicio;

class EjercicioController extends Controller
{
    public function index()
    {
        $ejercicios = Ejercicio::all();
        return response()->json($ejercicios);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'categoria' => 'nullable|string|max:50',
            'grupo_muscular' => 'nullable|string|max:50',
            'nivel_dificultad' => 'nullable|string|max:20',
            'descripcion' => 'nullable|string',
            'instrucciones' => 'nullable|string',
            'video_url' => 'nullable|string|max:255',
            'imagen_url' => 'nullable|string|max:255'
        ]);

        $ejercicio = Ejercicio::create($validatedData);
        return response()->json($ejercicio, 201);
    }

    public function show($id)
    {
        $ejercicio = Ejercicio::findOrFail($id);
        return response()->json($ejercicio);
    }

    public function update(Request $request, $id)
    {
        $ejercicio = Ejercicio::findOrFail($id);
        
        $validatedData = $request->validate([
            'nombre' => 'string|max:100',
            'categoria' => 'nullable|string|max:50',
            'grupo_muscular' => 'nullable|string|max:50',
            'nivel_dificultad' => 'nullable|string|max:20',
            'descripcion' => 'nullable|string',
            'instrucciones' => 'nullable|string',
            'video_url' => 'nullable|string|max:255',
            'imagen_url' => 'nullable|string|max:255'
        ]);

        $ejercicio->update($validatedData);
        return response()->json($ejercicio);
    }

    public function destroy($id)
    {
        $ejercicio = Ejercicio::findOrFail($id);
        $ejercicio->delete();
        return response()->json(null, 204);
    }

    public function getByCategoria($categoria)
    {
        $ejercicios = Ejercicio::where('categoria', $categoria)->get();
        return response()->json($ejercicios);
    }
}
