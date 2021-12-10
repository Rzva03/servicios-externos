<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoSectorController extends Controller
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
        $tipoSector = DB::table('tiposector')->get();
        return view('TipoSector.index', [
            'tipoSectores' => $tipoSector,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TipoSector.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoSector = DB::table('tiposector')->insert([
            'nomTipoSec' => $request->input('txtNombre'),
        ]);
        return redirect()->route('tipo-sector.index');
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
        $tipoSector = DB::table('tiposector')
            ->where('idTipoSec', '=', $id)
            ->first();
        return view('TipoSector.actualizar', [
            'tipoSectores' => $tipoSector,
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
        $tipoSector = DB::table('tiposector')
            ->where('idTipoSec', '=', $id)
            ->update([
                'nomTipoSec' => $request->input('txtNombre'),
            ]);
        return redirect()->route('tipo-sector.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tiposector')
            ->where('idTipoSec', '=', $id)
            ->delete();
        return redirect()->route('tipo-sector.index');
    }
}