<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaConvenioController extends Controller
{
    public function index()
    {
        /* -------------------------------------------------------------------------- */
        /*                              obtener fecha CMX                             */
        /* -------------------------------------------------------------------------- */
        date_default_timezone_set('America/Mexico_City');
        $fecha = date('d/m/Y');
        $instancia = DB::table('instancia')->get();
        /* -------------------------------------------------------------------------- */
        /*                obtener el id de los convenios que sean marco               */
        /* -------------------------------------------------------------------------- */
        $tipoConvenios = DB::table('tipoconvenio')
            ->select('idTipoConvenio')
            ->where(
                'nomtipoConvenio',
                '=',
                'CONVENIO MARCO DE COLABORACIÓN ACADÉMICA, CIENTÍFICA Y TECNOLÓGICA'
            )
            ->get();
        /* -------------------------------------------------------------------------- */
        /*                         variable para obtener el id                        */
        /* -------------------------------------------------------------------------- */
        foreach ($tipoConvenios as $tipoConvenio) {
            $tipoConvenio = $tipoConvenio->idTipoConvenio;
        }
        $convenio = DB::table('convenio')
            ->where('estatus', '=', 'VIGENTE')
            ->where('idTipoCon', '=', $tipoConvenio)
            ->get();
        return view('ConsultaConvenio.index', [
            'instancias' => $instancia,
            'convenios' => $convenio,
            'fecha' => $fecha,
        ]);
    }
}