<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaConocimientoController extends Controller
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
        $areaConocimiento = DB::table('areaconoc')->get();
        return view('AreaConocimiento.index', [
            'areaConocimientos' => $areaConocimiento,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AreaConocimiento.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $areaConocimiento = DB::table('areaconoc')->insert([
            'nomAreaC' => $request->input('txtNombre'),
        ]);
        return redirect()->route('area-conocimiento.index');
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
        $areaConocimiento = DB::table('areaconoc')
            ->where('idAreaC', '=', $id)
            ->first();
        return view('AreaConocimiento.actualizar', [
            'areaConocimientos' => $areaConocimiento,
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
        $areaConocimiento = DB::table('areaconoc')
            ->where('idAreaC', '=', $id)
            ->update([
                'nomAreaC' => $request->input('txtNombre'),
            ]);
        return redirect()->route('area-conocimiento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('areaconoc')
            ->where('idAreaC', '=', $id)
            ->delete();
        return redirect()->route('area-conocimiento.index');
    }
}