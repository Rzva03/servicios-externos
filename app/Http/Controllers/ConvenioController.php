<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instancia = DB::table('instancia')->get();
        $tipoConvenio = DB::table('tipoconvenio')->get();
        $convenio = DB::table('convenio')->get();
        return view('Convenio.index', [
            'convenios' => $convenio,
            'tipoConvenios' => $tipoConvenio,
            'instancias' => $instancia,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $ultimoConvenio = null;
        // $convenio = DB::table('convenio')->orderBy('idConvenio', 'desc')->first();
        // if ($convenio === null) {
        //     $ultimoConvenio = 1;
        // } else {
        //     $convenioId = $convenio->idConvenio;
        //     $ultimoConvenio = $convenioId + 1;
        // }
        $carrera = DB::table('carrera')->get();
        $indicador = DB::table('indicador')->get();
        $tipoConvenio = DB::table('tipoconvenio')->get();
        $instancia = DB::table('instancia')->get();
        return view('Convenio.nuevo', [
            'tiposConvenios' => $tipoConvenio,
            'instancias' => $instancia,
            'indicadores' => $indicador,
            'carreras' => $carrera,
            // 'convenios' => $ultimoConvenio
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $convenio = DB::table('convenio')->insert([
            'folio' => $request->input('txtFolio'),
            'fechaFirma' => $request->input('dateFechaFirma'),
            'fechaVigencia' => $request->input('dateFechaVigencia'),
            'estatus' => $request->input('txtEstatus'),
            'urlConvenio' => $request->input('txtUrlConvenio'),
            'idTipoCon' => $request->input('txtIdTipoCon'),
            'idInstancia' => $request->input('txtIdInstancia'),
            'idUsuario' => $request->input('txtIdUsuario'),
            'idIndicador' => $request->input('txtIdIndicador'),
        ]);
        // $detalleIndicador = DB::table('detalleindicador')->insert(array(
        //     'idIndicador' => $request->input('txtIdIndicador'),
        //     'idConvenio' => $request->input('txtIdConvenio')
        // ));
        return redirect()->route('convenio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indicador = DB::table('indicador')->get();
        // $detalleIndicador = DB::table('detalleindicador')->get();
        $tipoConvenio = DB::table('tipoconvenio')->get();
        $instancia = DB::table('instancia')->get();
        $convenio = DB::table('convenio')
            ->where('idConvenio', '=', $id)
            ->first();
        return view('Convenio.actualizar', [
            'convenios' => $convenio,
            'tipoConvenios' => $tipoConvenio,
            'instancias' => $instancia,
            'indicadores' => $indicador,
            // 'detallesIndicadores' => $detalleIndicador
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $convenio = DB::table('convenio')
            ->where('idConvenio', '=', $id)
            ->update([
                'folio' => $request->input('txtFolio'),
                'fechaFirma' => $request->input('dateFechaFirma'),
                'fechaVigencia' => $request->input('dateFechaVigencia'),
                'estatus' => $request->input('txtEstatus'),
                'urlConvenio' => $request->input('txtUrlConvenio'),
                'idTipoCon' => $request->input('txtIdTipoCon'),
                'idInstancia' => $request->input('txtIdInstancia'),
                'idUsuario' => $request->input('txtIdUsuario'),
                'idIndicador' => $request->input('txtIdIndicador'),
            ]);
        // $detalleIndicador = DB::table('detalleindicador')->insert(array(
        //     'idIndicador' => $request->input('txtIdIndicador'),
        //     'idConvenio' => $request->input('txtIdConvenio')
        // ));
        return redirect()->route('convenio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('convenio')
            ->where('idConvenio', '=', $id)
            ->delete();
        return redirect()->route('convenio.index');
    }
}