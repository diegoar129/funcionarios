<?php

namespace App\Http\Controllers;
use App\Models\Experiencia;
use Illuminate\Http\Request;

class ExperienciaController extends Controller
{
    //registro experiencia laboral
    public function store(Request $request)
    {
        $validated = $request->validate([
            'funcionario_id' => 'required|exists:funcionarios,id',
            'empresa' => 'required|string',
            'cargo' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'descripcion' => 'nullable|string',
        ]);

        return Experiencia::create($validated);
    }

    // llamado de lista de experiencias
    public function index($id)
    {
        return Experiencia::where('funcionario_id', $id)->get();
    }
}
