<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;

    public function competencias() {
        return $this->belongsToMany(Competencia::class);
    }

    protected $fillable = [
        'nombre',
    ];
}
