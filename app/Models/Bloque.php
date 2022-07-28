<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloque extends Model
{
    use HasFactory;

    public function horario() {
        return $this->belongsTo(Horario::class);
    }

    public function competencia() {
        return $this->belongsTo(Competencia::class);
    }
    public function ambiente() {
        return $this->belongsTo(Ambiente::class);
    }

    protected $fillable = [
        'dia',
        'hora_inicio',
        'duracion',
        'competencia_id',
        'horario_id',
        'ambiente_id',
    ];
}
