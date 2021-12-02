<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultasController extends Controller
{
    public function index()
    {
        $indicador = DB::table('indicador')
            ->where('descripcion', 'like', '%FIRMAR%')
            ->get();
        return $indicador;
    }
    public function getPDF()
    {
        $indicador = DB::table('indicador')
            ->where('descripcion', 'like', '%FIRMAR%')
            ->get();
        return $indicador;
    }
}