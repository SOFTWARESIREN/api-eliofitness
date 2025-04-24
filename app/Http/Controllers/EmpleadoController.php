<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return response()->json($empleados);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:empleados|max:150',
            'telefono' => 'nullable|string|max:20',
            'puesto' => 'required|string|max:50',
            'fecha_contratacion' => 'required|date',
            'estado' => 'string|in:activo,inactivo',
            'usuario_sistema_id' => 'nullable|exists:usuarios,usuario_id'
        ]);

        $empleado = Empleado::create($validatedData);
        return response()->json($empleado, 201);
    }

    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        return response()->json($empleado);
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);
        
        $validatedData = $request->validate([
            'nombre' => 'string|max:100',
            'apellido' => 'string|max:100',
            'email' => 'email|unique:empleados,email,'.$id.'|max:150',
            'telefono' => 'nullable|string|max:20',
            'puesto' => 'string|max:50',
            'fecha_contratacion' => 'date',
            'estado' => 'string|in:activo,inactivo',
            'usuario_sistema_id' => 'nullable|exists:usuarios,usuario_id'
        ]);

        $empleado->update($validatedData);
        return response()->json($empleado);
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return response()->json(null, 204);
    }

    public function getByPuesto($puesto)
    {
        $empleados = Empleado::where('puesto', $puesto)
                            ->where('estado', 'activo')
                            ->get();
        return response()->json($empleados);
    }
}
