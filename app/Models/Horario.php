<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    public function periodo() {
        return $this->belongsTo(Periodo::class);
    }
    public function docente() {
        return $this->belongsTo(Docente::class);
    }
    public function ambiente() {
        return $this->belongsTo(Ambiente::class);
    }
    public function bloque() {
        return $this->belongsTo(Bloque::class);
    }

    protected $fillable = [
        'periodo_id',
        'docente_id',
        'ambiente_id',
        'bloque_id',
    ];
}
