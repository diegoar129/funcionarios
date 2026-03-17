<?php

namespace App\Http\Controllers;
use App\Models\Estudio;
use Illuminate\Http\Request;

class EstudioController extends Controller
{
    private function requireLogin()
    {
        if (!session()->has('user')) {
            return redirect()->route('login')->with('error', 'Por favor inicia sesión para continuar.');
        }

        return null;
    }

    // Formulario para crear un estudio
    public function create($funcionarioId)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        return view('funcionarios.registroEstudio', ['funcionarioId' => $funcionarioId]);
    }

    // Registro estudio
    public function store(Request $request, $funcionarioId)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

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
