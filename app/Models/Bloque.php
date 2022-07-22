<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloque extends Model
{
    use HasFactory;

    public function horarios() {
        return $this->hasMany(Horario::class);
    }

    public function competencia() {
        return $this->belongsTo(Competencia::class);
    }

    protected $fillable = [
        'dia',
        'hora_inicio',
        'hora_fin',
        'competencia_id',
    ];
}
