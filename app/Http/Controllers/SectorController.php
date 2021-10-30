<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sector = DB::table('sector')->get();
             return view('Sector.index', [
                 'sectores' => $sector
             ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sector.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sector = DB::table('sector')->insert(array(
            'nomSector'=>$request->input('txtNombre')
        ));
        return redirect()->route('sector.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sector = DB::table('sector')->where('idSector', '=', $id)->first();
        return view('Sector.detalle',[
            'sectores'=>$sector
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sector = DB::table('sector')->where('idSector', '=', $id)->first();
        return view('Sector.actualizar',[
            'sectores'=>$sector
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
        $sector=DB::table('sector')->where('idSector', '=', $id)->update(array(
            'nomSector'=>$request->input('txtNombre')
        ));
        return redirect()->route('sector.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('sector')->where('idSector', '=', $id)->delete();
        return redirect()->route('sector.index');
    }

}