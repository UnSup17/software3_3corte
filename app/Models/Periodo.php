<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    public function horarios() {
        return $this->hasMany(Horario::class);
    }

    protected $fillable = [
        'nombre',
        'fechaInicio',
        'fechaFinal',
    ];
}
