<?php

namespace App\Http\Controllers;

use App\Models\Ambiente;
use App\Models\Competencia;
use App\Models\Docente;
use App\Models\Periodo;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function form_crear() {
        $dias = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
        return view('horarios.form_crear_horario', [
            "periodos" => Periodo::all(),
            "docentes" => Docente::where('estado', 'activo')->get(),
            "competencias" => Competencia::all(),
            "ambientes" => Ambiente::all(),
            "dias" => $dias,
        ]);
    }
    public function crear(Request $request) {
        $data = $request->all();

    }
}
