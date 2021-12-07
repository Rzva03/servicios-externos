<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsesorInternoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asesorInterno = DB::table('asesorinterno')->get();
        return view('AsesorInterno.index', [
            'asesoresInternos' => $asesorInterno
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AsesorInterno.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asesorInterno = DB::table('asesorinterno')->insert(array(
            'nombre' => $request->input('txtNombre'),
            'email' => $request->input('txtEmail'),
            'telefono' => $request->input('txtTelefono')
        ));
        return redirect()->route('asesor-interno.index');
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
        $asesorInterno = DB::table('asesorinterno')->where('idAsesorI', '=', $id)->first();
        return view('AsesorInterno.actualizar', [
            'asesoresInternos' => $asesorInterno
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
        $asesorInterno = DB::table('asesorinterno')->where('idAsesorI', '=', $id)->update(array(
            'nombre' => $request->input('txtNombre'),
            'email' => $request->input('txtEmail'),
            'telefono' => $request->input('txtTelefono')
        ));
        return redirect()->route('asesor-interno.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('asesorinterno')->where('idAsesorI', '=', $id)->delete();
        return redirect()->route('asesor-interno.index');
    }
}