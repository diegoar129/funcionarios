<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    protected $fillable = [
        'funcionario_id',
        'empresa',
        'cargo',
        'fecha_inicio',
        'fecha_fin',
        'descripcion'
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}
