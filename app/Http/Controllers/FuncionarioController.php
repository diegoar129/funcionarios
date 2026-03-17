<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    private function requireLogin()
    {
        if (!session()->has('user')) {
            return redirect()->route('login')->with('error', 'Por favor inicia sesión para continuar.');
        }

        return null;
    }

    // Lista funcionarios en una vista
    public function index(Request $request)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $query = Funcionario::with(['estudios', 'experiencias']);

        if ($search = $request->query('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('documento', 'like', "%{$search}%")
                    ->orWhere('nombres', 'like', "%{$search}%")
                    ->orWhere('apellidos', 'like', "%{$search}%");
            });
        }

        $funcionarios = $query->paginate(10)->withQueryString();

        return view('funcionarios.lista', compact('funcionarios'));
    }

    // Formulario de creación
    public function create()
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        return view('funcionarios.registro');
    }

    // Guarda un funcionario y redirige a la lista
    public function store(Request $request)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

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
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $funcionario = Funcionario::with(['estudios', 'experiencias'])->findOrFail($id);
        return view('funcionarios.hojaVida', compact('funcionario'));
    }

    // Formulario para editar funcionario
    public function edit($id)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $funcionario = Funcionario::findOrFail($id);

        return view('funcionarios.editar', compact('funcionario'));
    }

    // Actualiza un funcionario
    public function update(Request $request, $id)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

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

    // Elimina un funcionario y sus relaciones
    public function destroy($id)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $funcionario = Funcionario::findOrFail($id);

        $funcionario->estudios()->delete();
        $funcionario->experiencias()->delete();
        $funcionario->delete();

        return redirect()->route('funcionarios.index')
            ->with('success', 'Funcionario eliminado correctamente.');
    }
}
