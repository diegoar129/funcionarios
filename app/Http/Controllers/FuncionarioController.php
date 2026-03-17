<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    // Lista funcionarios en una vista
    public function index()
    {
        $funcionarios = Funcionario::with(['estudios', 'experiencias'])->paginate(10);
        return view('funcionarios.lista', compact('funcionarios'));
    }

    // Formulario de creación
    public function create()
    {
        return view('funcionarios.registro');
    }

    // Guarda un funcionario y redirige a la lista
    public function store(Request $request)
    {
        $validated = $request->validate([
            'documento' => 'required|unique:funcionarios',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'correo' => 'required|email|unique:funcionarios',
            'telefono' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'cargo_actual' => 'required|string',
            'dependencia' => 'required|string',
        ]);

        Funcionario::create($validated);

        return redirect()->route('funcionarios.index')
            ->with('success', 'Funcionario creado correctamente.');
    }

    // Muestra la hoja de vida de un funcionario
    public function show($id)
    {
        $funcionario = Funcionario::with(['estudios', 'experiencias'])->findOrFail($id);
        return view('funcionarios.hojaVida', compact('funcionario'));
    }

    // Actualiza un funcionario
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

        return redirect()->route('funcionarios.show', $funcionario->id)
            ->with('success', 'Funcionario actualizado correctamente.');
    }
}
