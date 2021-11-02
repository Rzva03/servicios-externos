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
        $convenio = DB::table('convenio')->get();
        return view('Convenio.index', [
            'convenios' => $convenio
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Convenio.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $convenio = DB::table('convenio')->insert(array(
            'folio' => $request->input('txtFolio'),
            'fechaFirma' => $request->input('txtFechaFirma'),
            'fechaVigencia' => $request->input('txtFechaVigencia'),
            'estatus' => $request->input('txtestatus'),
            'idTipoCon' => $request->input('txtIdTipoCon'),
            'idInstancia' => $request->input('txtIdInstancia'),
            'idUsuario' => $request->input('txtIdUsuario'),
        ));
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
        $convenio = DB::table('convenio')->where('idConvenio', '=', $id)->first();
        return view('Convenio.actualizar', [
            'convenios' => $convenio
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
        $convenio = DB::table('convenio')->where('idProyecto', '=', $id)->update(array(
            'folio' => $request->input('txtFolio'),
            'fechaFirma' => $request->input('txtFechaFirma'),
            'fechaVigencia' => $request->input('txtFechaVigencia'),
            'estatus' => $request->input('txtestatus'),
            'idTipoCon' => $request->input('txtIdTipoCon'),
            'idInstancia' => $request->input('txtIdInstancia'),
            'idUsuario' => $request->input('txtIdUsuario'),
        ));
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

        DB::table('convenio')->where('idConvenio', '=', $id)->delete();
        return redirect()->route('convenio.index');
    }
}