<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaIndicadoresController extends Controller
{
    public function index(Request $request)
    {
        // $carrera = DB::table('carrera')->get();
        $instancia = DB::table('instancia')->get();
        $tipoConvenio = DB::table('tipoconvenio')->get();

        /* -------------------------------------------------------------------------- */
        /*                obtener el id de los convenios que sean marco               */
        /* -------------------------------------------------------------------------- */
        // $tipoConvenios = DB::table('tipoconvenio')
        //     ->select('idTipoConvenio')
        //     ->where(
        //         'nomtipoConvenio',
        //         '=',
        //         'CONVENIO MARCO DE COLABORACIÓN ACADÉMICA, CIENTÍFICA Y TECNOLÓGICA'
        //     )
        //     ->get();
        /* -------------------------------------------------------------------------- */
        /*                         variable para obtener el id                        */
        /* -------------------------------------------------------------------------- */
        // foreach ($tipoConvenios as $tipoConvenio) {
        //     $tipoConvenio = $tipoConvenio->idTipoConvenio;
        // }
        /* -------------------------------------------------------------------------- */
        /*                         obtener fechas e indicador                         */
        /* -------------------------------------------------------------------------- */
        $fechaInicio = $request->input('txtFechaInicial');
        $fechaFinal = $request->input('txtFechaFinal');
        $indicadorRequest = $request->input('sltIndicador');
        $trimestreRequest = $request->input('sltTrimestre');
        $anioRequest = $request->input('sltAnio');
        /* -------------------------------------------------------------------------- */
        /*                obtener el numero del indicador para mostrar                */
        /* -------------------------------------------------------------------------- */
        $convenios = DB::table('convenio')
            // ->where('idTipoCon', '=', $tipoConvenio)
            ->where('idOtroIndicador', '=', $indicadorRequest)
            ->where('estatus', '=', 'VIGENTE')
            ->whereBetween('fechaFirma', [$fechaInicio, $fechaFinal])
            ->get();
        // $indicadorCount = count($convenioIndicador);
        $indicador = DB::table('otroIndicador')
            // ->where('descripcion', 'like', '%FIRMAR%')
            ->get();
        return view('ConsultaIndicadores.index', [
            'indicadores' => $indicador,
            'convenios' => $convenios,
            'indicadorRequest' => $indicadorRequest,
            'trimestreRequest' => $trimestreRequest,
            'anioRequest' => $anioRequest,
            'fechaInicio' => $fechaInicio,
            'fechaFinal' => $fechaFinal,
            'tipoConvenios' => $tipoConvenio,
            'instancias' => $instancia,
            // 'carreras' => $carrera,
        ]);
    }
    public function consultaConveniosPorTrimestre(Request $request)
    {
        // $carrera = DB::table('carrera')->get();
        $instancia = DB::table('instancia')->get();
        $tipoConvenio = DB::table('tipoconvenio')->get();

        /* -------------------------------------------------------------------------- */
        /*                obtener el id de los convenios que sean marco               */
        /* -------------------------------------------------------------------------- */
        // $tipoConvenios = DB::table('tipoconvenio')
        //     ->select('idTipoConvenio')
        //     ->where(
        //         'nomtipoConvenio',
        //         '=',
        //         'CONVENIO MARCO DE COLABORACIÓN ACADÉMICA, CIENTÍFICA Y TECNOLÓGICA'
        //     )
        //     ->get();
        /* -------------------------------------------------------------------------- */
        /*                         variable para obtener el id                        */
        /* -------------------------------------------------------------------------- */
        // foreach ($tipoConvenios as $tipoConvenio) {
        //     $tipoConvenio = $tipoConvenio->idTipoConvenio;
        // }
        /* -------------------------------------------------------------------------- */
        /*                         obtener fechas e indicador                         */
        /* -------------------------------------------------------------------------- */
        $fechaInicio = $request->input('txtFechaInicial');
        $fechaFinal = $request->input('txtFechaFinal');
        // $indicadorRequest = $request->input('sltIndicador');
        $trimestreRequest = $request->input('sltTrimestre');
        $anioRequest = $request->input('sltAnio');
        /* -------------------------------------------------------------------------- */
        /*                obtener el numero del indicador para mostrar                */
        /* -------------------------------------------------------------------------- */
        $convenios = DB::table('convenio')
            // ->where('idTipoCon', '=', $tipoConvenio)
            // ->where('idOtroIndicador', '=', $indicadorRequest)
            // ->where('estatus', '=', 'VIGENTE')
            ->whereBetween('fechaFirma', [$fechaInicio, $fechaFinal])
            ->get();
        // $indicadorCount = count($convenioIndicador);
        // $indicador = DB::table('otroIndicador')
        // ->where('descripcion', 'like', '%FIRMAR%')
        // ->get();
        return view('ConsultaIndicadores.convenios', [
            // 'indicadores' => $indicador,
            'convenios' => $convenios,
            // 'indicadorRequest' => $indicadorRequest,
            'trimestreRequest' => $trimestreRequest,
            'anioRequest' => $anioRequest,
            'fechaInicio' => $fechaInicio,
            'fechaFinal' => $fechaFinal,
            'tipoConvenios' => $tipoConvenio,
            'instancias' => $instancia,
            // 'carreras' => $carrera,
        ]);
    }
}
