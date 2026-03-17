<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use Illuminate\Http\Request;

class ExperienciaController extends Controller
{
    public function create($funcionarioId)
    {
        return view('funcionarios.registroExperiencia', ['funcionarioId' => $funcionarioId]);
    }

    public function store(Request $request, $funcionarioId)
    {
        $validated = $request->validate([
            'empresa' => 'required|string',
            'cargo' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date',
            'descripcion' => 'nullable|string',
        ]);

        $validated['funcionario_id'] = $funcionarioId;

        Experiencia::create($validated);

        return redirect()->route('funcionarios.show', $funcionarioId)
            ->with('success', 'Experiencia agregada correctamente.');
    }

    public function index($funcionarioId)
    {
        return Experiencia::where('funcionario_id', $funcionarioId)->get();
    }
}
