<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndicadorController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indicador = DB::table('indicador')->get();
        return view('Indicador.index', [
            'indicadores' => $indicador,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Indicador.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $indicador = DB::table('indicador')->insert([
            'nombre' => $request->input('txtNombre'),
            'descripcion' => $request->input('txtDescripcion'),
        ]);
        return redirect()->route('indicador.index');
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
        $indicador = DB::table('indicador')
            ->where('idIndicador', '=', $id)
            ->first();
        return view('Indicador.actualizar', [
            'indicadores' => $indicador,
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
        $indicador = DB::table('indicador')
            ->where('idIndicador', '=', $id)
            ->update([
                'nombre' => $request->input('txtNombre'),
                'descripcion' => $request->input('txtDescripcion'),
            ]);
        return redirect()->route('indicador.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('indicador')
            ->where('idIndicador', '=', $id)
            ->delete();
        return redirect()->route('indicador.index');
    }
}