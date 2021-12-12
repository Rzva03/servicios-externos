<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        date_default_timezone_set('America/Mexico_City');
        $fecha = date('Y-m-d');
        /* -------------------------------------------------------------------------- */
        /*                              realizar consulta                             */
        /* -------------------------------------------------------------------------- */
        $convenios = DB::table('convenio')
            ->where('estatus', '=', 'VIGENTE')
            ->where('fechaVigencia', '=', $fecha)
            ->get();
        /* -------------------------------------------------------------------------- */
        /*               Recorrer convenios con fecha de vigencia actual              */
        /* -------------------------------------------------------------------------- */
        foreach ($convenios as $convenio) {
            $idConvenio = $convenio->idConvenio;
            $convenio = DB::table('convenio')
                ->where('idConvenio', $idConvenio)
                ->update(['estatus' => 'FINALIZADO']);
        }
        return view('home');
    }
}