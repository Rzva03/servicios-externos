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
    public function convenioVigenteTodos()
    {
        /* -------------------------------------------------------------------------- */
        /*                              obtener fecha CMX                             */
        /* -------------------------------------------------------------------------- */
        date_default_timezone_set('America/Mexico_City');
        $fecha = date('d/m/Y');
        $instancia = DB::table('instancia')->get();
        /* -------------------------------------------------------------------------- */
        /*                         variable para obtener el id                        */
        /* -------------------------------------------------------------------------- */
        $convenio = DB::table('convenio')
            ->where('estatus', '=', 'VIGENTE')
            ->get();
        return view('ConsultaConvenio.vigentes', [
            'instancias' => $instancia,
            'convenios' => $convenio,
            'fecha' => $fecha,
        ]);
    }
    public function convenioVencidoTodos()
    {
        /* -------------------------------------------------------------------------- */
        /*                              obtener fecha CMX                             */
        /* -------------------------------------------------------------------------- */
        date_default_timezone_set('America/Mexico_City');
        $fecha = date('d/m/Y');
        $instancia = DB::table('instancia')->get();
        /* -------------------------------------------------------------------------- */
        /*                         variable para obtener el id                        */
        /* -------------------------------------------------------------------------- */
        $convenio = DB::table('convenio')
            ->where('estatus', '=', 'FINALIZADO')
            ->get();
        return view('ConsultaConvenio.finalizado', [
            'instancias' => $instancia,
            'convenios' => $convenio,
            'fecha' => $fecha,
        ]);
    }
    public function formularioConvenioPorAnio(Request $request)
    {
        $instancia = DB::table('instancia')->get();
        $tipoConvenio = DB::table('tipoconvenio')->get();
        /* -------------------------------------------------------------------------- */
        /*                         obtener fechas e indicador                         */
        /* -------------------------------------------------------------------------- */
        $fechaInicio = $request->input('dateFechaInicial');
        $fechaFinal = $request->input('dateFechaFinal');
        /* -------------------------------------------------------------------------- */
        /*                obtener el numero del indicador para mostrar                */
        /* -------------------------------------------------------------------------- */
        $convenios = DB::table('convenio')
            ->whereBetween('fechaVigencia', [$fechaInicio, $fechaFinal])
            // ->where('estatus', '=', 'VIGENTE')
            ->orderBy('fechaVigencia', 'asc')
            ->get();
        return view('ConsultaConvenio.convenios-anio', [
            'convenios' => $convenios,
            'fechaInicio' => $fechaInicio,
            'fechaFinal' => $fechaFinal,
            'tipoConvenios' => $tipoConvenio,
            'instancias' => $instancia,
        ]);
    }
    public function formularioConvenioPorFecha(Request $request)
    {
        $instancia = DB::table('instancia')->get();
        $tipoConvenio = DB::table('tipoconvenio')->get();
        /* -------------------------------------------------------------------------- */
        /*                         obtener fechas e indicador                         */
        /* -------------------------------------------------------------------------- */
        $fecha = $request->input('dateFecha');
        /* -------------------------------------------------------------------------- */
        /*                obtener el numero del indicador para mostrar                */
        /* -------------------------------------------------------------------------- */
        // $convenios = DB::table('convenio')
        //     ->where('fechaVigencia', '<=', $fecha)
        //     ->orWhere('fechaFirma', '<=', $fecha)
        //     ->where('estatus', '=', 'VIGENTE')
        //     ->get();
        $convenios = DB::select(
            'select * from convenio where (fechaFirma <= ? OR fechaVigencia <= ? ) AND estatus = "VIGENTE"',
            [$fecha, $fecha]
        );
        return view('ConsultaConvenio.convenios-fecha', [
            'convenios' => $convenios,
            'fecha' => $fecha,
            'tipoConvenios' => $tipoConvenio,
            'instancias' => $instancia,
        ]);
    }
}
