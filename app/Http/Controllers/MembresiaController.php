<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membresia;

class MembresiaController extends Controller
{
    public function index()
    {
        $membresias = Membresia::all();
        return response()->json($membresias);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio_mensual' => 'required|numeric|min:0',
            'precio_trimestral' => 'required|numeric|min:0',
            'precio_anual' => 'required|numeric|min:0',
            'beneficios' => 'nullable|string',
            'activa' => 'boolean'
        ]);

        $membresia = Membresia::create($validatedData);
        return response()->json($membresia, 201);
    }

    public function show($id)
    {
        $membresia = Membresia::findOrFail($id);
        return response()->json($membresia);
    }

    public function update(Request $request, $id)
    {
        $membresia = Membresia::findOrFail($id);
        
        $validatedData = $request->validate([
            'nombre' => 'string|max:100',
            'descripcion' => 'nullable|string',
            'precio_mensual' => 'numeric|min:0',
            'precio_trimestral' => 'numeric|min:0',
            'precio_anual' => 'numeric|min:0',
            'beneficios' => 'nullable|string',
            'activa' => 'boolean'
        ]);

        $membresia->update($validatedData);
        return response()->json($membresia);
    }

    public function destroy($id)
    {
        $membresia = Membresia::findOrFail($id);
        $membresia->delete();
        return response()->json(null, 204);
    }
}
