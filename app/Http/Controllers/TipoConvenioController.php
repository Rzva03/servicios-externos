<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoConvenio = DB::table('tipoconvenio')->get();
        return view('TipoConvenio.index', [
            'tiposConvenios' => $tipoConvenio,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TipoConvenio.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoConvenio = DB::table('tipoconvenio')->insert([
            'nomtipoConvenio' => $request->input('txtNombre'),
        ]);
        return redirect()->route('tipo-convenio.index');
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
        $tipoConvenio = DB::table('tipoconvenio')
            ->where('idTipoConvenio', '=', $id)
            ->first();
        return view('TipoConvenio.actualizar', [
            'tiposConvenios' => $tipoConvenio,
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
        $tipoConvenio = DB::table('tipoconvenio')
            ->where('idTipoConvenio', '=', $id)
            ->update([
                'nomTipoConvenio' => $request->input('txtNombre'),
            ]);
        return redirect()->route('tipo-convenio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tipoconvenio')
            ->where('idTipoConvenio', '=', $id)
            ->delete();
        return redirect()->route('tipo-convenio.index');
    }
}