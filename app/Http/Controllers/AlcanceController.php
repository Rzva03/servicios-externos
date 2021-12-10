<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AlcanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $alcance = DB::table('alcance')->get();
        return view('Alcance.index', [
            'alcances' => $alcance,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Alcance.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alcance = DB::table('alcance')->insert([
            'nombre' => $request->input('txtNombre'),
        ]);
        return redirect()->route('alcance.index');
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
        $alcance = DB::table('alcance')
            ->where('idAlcance', '=', $id)
            ->first();
        return view('Alcance.actualizar', [
            'alcances' => $alcance,
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
        $alcance = DB::table('alcance')
            ->where('idAlcance', '=', $id)
            ->update([
                'nombre' => $request->input('txtNombre'),
            ]);
        return redirect()->route('alcance.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('alcance')
            ->where('idAlcance', '=', $id)
            ->delete();
        return redirect()->route('alcance.index');
    }
}