<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    use HasFactory;

    public function bloques() {
        return $this->hasMany(Bloque::class);
    }

    public function programas() {
        return $this->belongsToMany(Programa::class, 'competencia_programa');
    }

    protected $fillable = [
        'tipoCompetencia',
        'nombre',
    ];
}
