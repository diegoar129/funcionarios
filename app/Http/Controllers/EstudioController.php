<?php

namespace App\Http\Controllers;
use App\Models\Estudio;
use Illuminate\Http\Request;

class EstudioController extends Controller
{
    // Formulario para crear un estudio
    public function create($funcionarioId)
    {
        return view('funcionarios.registroEstudio', ['funcionarioId' => $funcionarioId]);
    }

    // Registro estudio
    public function store(Request $request, $funcionarioId)
    {
        $validated = $request->validate([
            'nivel' => 'required|string',
            'titulo' => 'required|string',
            'institucion' => 'required|string',
            'fecha_graduacion' => 'required|date',
        ]);

        $validated['funcionario_id'] = $funcionarioId;

        Estudio::create($validated);

        return redirect()->route('funcionarios.show', $funcionarioId)
            ->with('success', 'Estudio agregado correctamente.');
    }

    // llamado de lista de estudios (API)
    public function index($id)
    {
        return Estudio::where('funcionario_id', $id)->get();
    }
}
