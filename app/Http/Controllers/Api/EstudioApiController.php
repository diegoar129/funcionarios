<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estudio;
use Illuminate\Http\Request;

class EstudioApiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'funcionario_id' => 'required|exists:funcionarios,id',
            'nivel' => 'required|string',
            'titulo' => 'required|string',
            'institucion' => 'required|string',
            'fecha_graduacion' => 'required|date',
        ]);

        $estudio = Estudio::create($validated);

        return response()->json($estudio, 201);
    }

    public function indexByFuncionario($id)
    {
        $estudios = Estudio::where('funcionario_id', $id)->get();

        return response()->json($estudios);
    }
}
