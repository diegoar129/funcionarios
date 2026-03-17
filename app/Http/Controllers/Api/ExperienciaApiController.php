<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Experiencia;
use Illuminate\Http\Request;

class ExperienciaApiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'funcionario_id' => 'required|exists:funcionarios,id',
            'empresa' => 'required|string',
            'cargo' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date',
            'descripcion' => 'nullable|string',
        ]);

        $experiencia = Experiencia::create($validated);

        return response()->json($experiencia, 201);
    }

    public function indexByFuncionario($id)
    {
        $experiencias = Experiencia::where('funcionario_id', $id)->get();

        return response()->json($experiencias);
    }
}
