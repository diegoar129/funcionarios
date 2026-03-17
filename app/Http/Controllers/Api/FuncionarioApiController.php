<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioApiController extends Controller
{
    public function index()
    {
        return response()->json(
            Funcionario::with(['estudios', 'experiencias'])->paginate(10)
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'documento' => 'required|unique:funcionarios,documento',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'correo' => 'required|email|unique:funcionarios,correo',
            'telefono' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'cargo_actual' => 'required|string',
            'dependencia' => 'required|string',
        ]);

        $funcionario = Funcionario::create($validated);

        return response()->json($funcionario, 201);
    }

    public function show($id)
    {
        $funcionario = Funcionario::with(['estudios', 'experiencias'])->findOrFail($id);

        return response()->json($funcionario);
    }

    public function update(Request $request, $id)
    {
        $funcionario = Funcionario::findOrFail($id);

        $validated = $request->validate([
            'documento' => 'required|unique:funcionarios,documento,' . $id,
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'correo' => 'required|email|unique:funcionarios,correo,' . $id,
            'telefono' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'cargo_actual' => 'required|string',
            'dependencia' => 'required|string',
        ]);

        $funcionario->update($validated);

        return response()->json($funcionario);
    }
}
