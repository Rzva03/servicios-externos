<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaIndicadorController extends Controller
{
    public function index()
    {
        $indicador = DB::table('indicador')->get();
        return view('ConsultaIndicador.index', [
            'indicadores' => $indicador,
        ]);
    }
}