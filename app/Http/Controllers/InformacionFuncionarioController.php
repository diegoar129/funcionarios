<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    // llama  funcionarios
    public function index()
    {
        return Funcionario::with(['estudios', 'experiencias'])->paginate(10);
    }

    // crea funcionario
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

        return Funcionario::create($validated);
    }

    // llamado a un funcionario
    public function show($id)
    {
        return Funcionario::with(['estudios', 'experiencias'])->findOrFail($id);
    }

    // Actualizacion de funcionario
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

        return $funcionario;
    }
}
