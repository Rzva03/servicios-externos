<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TamanioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tamanio = DB::table('tamanio')->get();
        return view('Tamanio.index', [
            'tamanios' => $tamanio
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tamanio.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tamanio = DB::table('tamanio')->insert(array(
            'nomTamanio' => $request->input('txtNombre')
        ));
        return redirect()->route('tamanio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tamanio = DB::table('tamanio')->where('idTamanio', '=', $id)->first();
        return view('Tamanio.actualizar', [
            'tamanios' => $tamanio
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
        $tamanio = DB::table('tamanio')->where('idTamanio', '=', $id)->update(array(
            'nomTamanio' => $request->input('txtNombre')
        ));
        return redirect()->route('tamanio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tamanio')->where('idTamanio', '=', $id)->delete();
        return redirect()->route('tamanio.index');
    }
}