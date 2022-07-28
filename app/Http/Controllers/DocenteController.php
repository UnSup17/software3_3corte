<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\User;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    function list() {
        return view('docentes.listado', ['lista_docentes' => Docente::all()]);
    }

    function form_crear() {
        return view('docentes.form_crear_docente');
    }
    function crear(Request $request) {
        $data = $request->all();
        User::create([
            'id' => $data['id'],
            'name' => $data['nombre'],
            'email' => $data['nombre'].$data['apellido'].'@mail.com',
            'password' => password_hash($data['id'], PASSWORD_DEFAULT),
        ]);
        Docente::create([
            'id' => $data['id'],
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'tipoID' => $data['tipoID'],
            'tipoDocente' => $data['tipoDocente'],
            'tipoContrato' => $data['tipoContrato'],
            'area' => $data['area'],
            'user_id' => $data['id'],
        ]);
        return redirect()->route('admin_docentes');
    }

    function read($docente_id) {
        $docente = Docente::find($docente_id);
        return view('docentes.info_docente', [
            'docente' => $docente,
            'horarios' => $docente->horarios,
        ]);
    }

    function form_actualizar($docente) {
        return view('docentes.form_actualizar_docente', ['docente' => Docente::find($docente)]);
    }
    function actualizar(Request $request, $docente) {
        $data = $request->all();
        $auxDocente = Docente::find($docente);
        $auxDocente->nombre = $data['nombre'];
        $auxDocente->apellido = $data['apellido'];
        $auxDocente->tipoDocente = $data['tipoDocente'];
        $auxDocente->tipoContrato = $data['tipoContrato'];
        $auxDocente->area = $data['area'];
        $auxDocente->save();
        return redirect()->route('admin_docentes');
    }

    function inactivar($docente) {
        $docente = Docente::find($docente);
        $docente->estado = 'inactivo';
        $docente->save();
        return redirect()->route('admin_docentes');
    }
}
