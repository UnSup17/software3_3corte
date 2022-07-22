<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    public function horarios() {
        return $this->hasMany(Horario::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'tipoID',
        'tipoDocente',
        'tipoContrato',
        'area',
        'estado',
        'user_id',
    ];
}
