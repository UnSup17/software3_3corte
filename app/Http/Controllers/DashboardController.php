<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function inicio(Request $request) {
        if ($request->user()->rol == 'Coordinador')
            return view('dashboard');
        return redirect()->route('read_docente', ["docente" => Docente::find($request->user()->id)]);
    }
}
