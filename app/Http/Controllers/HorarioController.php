<?php

namespace App\Http\Controllers;

use App\Models\Ambiente;
use App\Models\Bloque;
use App\Models\Competencia;
use App\Models\Docente;
use App\Models\Horario;
use App\Models\Periodo;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function form_crear() {
        $dias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
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
        $docente = Docente::find($data['docente']);
        $horario = $docente->horarios()->where('periodo_id', $data['periodo'])->get();

        $flag = $this->esFranjaValida($request, $docente, $horario, $data);

        if (!$flag) {
            return redirect()->route('form_crear_horario');
        }

        $id_horario = $this->returnIdHorario($horario, $data);
        Bloque::create([
            'dia' => $data['dia'],
            'hora_inicio' => $data['hora_inicio'],
            'duracion' => $data['duracion'],
            'competencia_id' => $data['competencia'],
            'ambiente_id' => $data['ambiente'],
            'horario_id' => $id_horario,
        ]);

        $request->session()->put('success', 'Bloque horario asignado');
        return redirect()->route('form_crear_horario');
    }
    private function returnIdHorario($horario, $data) {
        if ($horario->isEmpty()) {
            $id_horario = $data['periodo'].$data['docente'];
            Horario::create([
                'id' => $id_horario,
                'periodo_id' => $data['periodo'],
                'docente_id' => $data['docente'],
            ]);
        }
        else {
            $id_horario = $horario[0]->id;
        }
        return $id_horario;
    }
    private function esFranjaValida(Request $request, $docente, $horario, $data) {
        if ((int)$data['hora_inicio'] + (int)$data['duracion'] > 22) {
            $request->session()->put('error', 'La jornada de trabajo debe ser máximo hasta las 22:00 horas');
            return false;
        }

        list($duracion_total, $franja_disponible) = $this->duracionTotalYDisponibilidadFranja($request, $data, $horario);
        if (!$franja_disponible)
            return false;

        return $this->auxMaxHoras($request, $data, $docente, $duracion_total);
    }
    private function duracionTotalYDisponibilidadFranja(Request $request, $data, $horario) {
        $duracion_total = (int)$data['duracion'];
        if (!$horario->isEmpty()) {
            foreach ($horario[0]->bloques as $bloque) {
                if (($bloque->dia == $data['dia']) and (
                    ($bloque->hora_inicio <= $data['hora_inicio'] and $data['hora_inicio'] < ($bloque->hora_inicio + $bloque->duracion)) or
                    ($data['hora_inicio'] < $bloque->hora_inicio and ($data['hora_inicio']+$data['duracion']) > $bloque->hora_inicio))) {
                    $request->session()->put('error', 'Franja de horario ocupada');
                    return [$duracion_total, false];
                }
                $duracion_total += $bloque->duracion;
            }
        }
        return [$duracion_total, true];
    }
    private function auxMaxHoras(Request $request, $data, $docente, $duracion_total) {
        if ($docente->tipoContrato == "pt" and (int)$data['duracion'] <= 8) {
            if ($duracion_total > 32) {
                $request->session()->put('error', 'El docente ya ha alcanzado, o superaría el tope de trabajo semanal con la duración de esta jornada');
                return false;
            }
            return true;
        }
        if ($docente->tipoContrato == "cnt" and (int)$data['duracion'] <= 10) {
            if ($duracion_total > 40) {
                $request->session()->put('error', 'El docente ya ha alcanzado, o superaría el tope de trabajo semanal con la duración de esta jornada');
                return false;

            }
            return true;
        }
        $request->session()->put('error', 'La duración de la jornada indicada supera lo establecido para el tipo de contrato del docente');
        return false;
    }

    public function read_horario($horario_id) {
        $horario_docente = Horario::find($horario_id);
        $dias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
        $horas = range(7, 22);
        $horario = array();
        $ignorar_td = array();
        $horas_semana = 0;
        foreach ($horario_docente->bloques as $bloque) {
            $horario[$bloque->dia.$bloque->hora_inicio] = $bloque;
            $horas_semana += $bloque->duracion;
            for ($i=0; $i < $bloque->duracion; $i++) {
                $ignorar_td[$bloque->dia.($bloque->hora_inicio + $i)] = '';
            }
        }
        return view('horarios.info_horario', [
            'dias' => $dias,
            'horas' => $horas,
            'horario' => $horario,
            'ignorar_td' => $ignorar_td,
            'horas_semana' => $horas_semana,
            'horario_docente' => $horario_docente,
        ]);
    }
}
