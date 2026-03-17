<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = [
        'documento',
        'nombres',
        'apellidos',
        'correo',
        'telefono',
        'fecha_nacimiento',
        'cargo_actual',
        'dependencia'
    ];

    //relacion de estudio y experiencia
    public function estudios()
    {
        return $this->hasMany(Estudio::class);
    }

    public function experiencias()
    {
        return $this->hasMany(Experiencia::class);
    }
}
