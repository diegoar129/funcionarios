<?php

namespace App\Http\Controllers;
use App\Models\Estudio;
use Illuminate\Http\Request;

class EstudioController extends Controller
{
    // Registro estudio
    public function store(Request $request)
    {
        $validated = $request->validate([
            'funcionario_id' => 'required|exists:funcionarios,id',
            'nivel' => 'required|string',
            'titulo' => 'required|string',
            'institucion' => 'required|string',
            'fecha_graduacion' => 'required|date',
        ]);

        return Estudio::create($validated);
    }

    // llamado de lista de estudios
    public function index($id)
    {
        return Estudio::where('funcionario_id', $id)->get();
    }
}
