<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaProyectoController extends Controller
{
    public function index(Request $request)
    {
        /* -------------------------------------------------------------------------- */
        /*                     Obtener datos que envia el usuario                     */
        /* -------------------------------------------------------------------------- */
        $periodoRequest = $request->input('sltPeriodo');
        $instanciaRequest = $request->input('sltInstancia');
        $modalidadRequest = $request->input('sltModalidad');
        /* -------------------------------------------------------------------------- */
        /*                           Enviar datos a la vista                          */
        /* -------------------------------------------------------------------------- */
        $instancia = DB::table('instancia')->get();
        $periodo = DB::table('periodo')->get();
        $alumno = DB::table('alumno')->get();
        $asesorInterno = DB::table('asesorinterno')->get();
        $asesorExterno = DB::table('asesorexterno')->get();
        /* -------------------------------------------------------------------------- */
        /*                         Programacion de la consulta                        */
        /* -------------------------------------------------------------------------- */
        $proyectos = DB::table('proyecto')
            ->where('modalidad', '=', $modalidadRequest)
            ->where('idInstancia', '=', $instanciaRequest)
            ->where('idPeriodo', '=', $periodoRequest)
            ->get();
        $proyectoCount = count($proyectos);
        /* -------------------------------------------------------------------------- */
        /*                              Retornar la vista                             */
        /* -------------------------------------------------------------------------- */
        return view('ConsultaProyecto.index', [
            'instancias' => $instancia,
            'periodos' => $periodo,
            'periodoRequest' => $periodoRequest,
            'instanciaRequest' => $instanciaRequest,
            'modalidadRequest' => $modalidadRequest,
            'proyectoCount' => $proyectoCount,
            'proyectos' => $proyectos,
            'asesoresInternos' => $asesorInterno,
            'asesoresExternos' => $asesorExterno,
            'alumnos' => $alumno,
        ]);
    }
}