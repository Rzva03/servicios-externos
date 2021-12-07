<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsesorExternoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asesorExterno = DB::table('asesorexterno')->get();
        return view('AsesorExterno.index', [
            'asesoresExternos' => $asesorExterno
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AsesorExterno.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asesorExterno = DB::table('asesorexterno')->insert(array(
            'nombre' => $request->input('txtNombre'),
            'email' => $request->input('txtEmail'),
            'telefono' => $request->input('txtTelefono')
        ));
        return redirect()->route('asesor-externo.index');
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
        $asesorExterno = DB::table('asesorexterno')->where('idAsesorE', '=', $id)->first();
        return view('AsesorExterno.actualizar', [
            'asesoresExternos' => $asesorExterno
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
        $asesorExterno = DB::table('asesorexterno')->where('idAsesorE', '=', $id)->update(array(
            'nombre' => $request->input('txtNombre'),
            'email' => $request->input('txtEmail'),
            'telefono' => $request->input('txtTelefono')
        ));
        return redirect()->route('asesor-externo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('asesorexterno')->where('idAsesorE', '=', $id)->delete();
        return redirect()->route('asesor-externo.index');
    }
}