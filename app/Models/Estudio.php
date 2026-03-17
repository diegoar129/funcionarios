<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    protected $fillable = [
        'funcionario_id',
        'nivel',
        'titulo',
        'institucion',
        'fecha_graduacion'
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}
