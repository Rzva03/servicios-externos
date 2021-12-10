<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'create', 'show', 'edit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrera = DB::table('carrera')->get();
        $alumno = DB::table('alumno')->get();
        return view('Alumno.index', [
            'alumnos' => $alumno,
            'carreras' => $carrera,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carrera = DB::table('carrera')->get();
        return view('Alumno.nuevo', [
            'carreras' => $carrera,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $idCarrera = (int)$request->input('txtIdCarrera');
        $alumno = DB::table('alumno')->insert([
            'nombre' => $request->input('txtNombre'),
            'email' => $request->input('txtEmail'),
            'telefono' => $request->input('txtTelefono'),
            'idCarrera' => $request->input('txtIdCarrera'),
        ]);
        return redirect()->route('alumno.index');
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
        $carrera = DB::table('carrera')->get();
        $alumno = DB::table('alumno')
            ->where('idAlumno', '=', $id)
            ->first();
        return view('Alumno.actualizar', [
            'alumnos' => $alumno,
            'carreras' => $carrera,
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
        // $idCarrera = (int)$request->input('txtIdCarrera');
        $alumno = DB::table('alumno')
            ->where('idAlumno', '=', $id)
            ->update([
                'nombre' => $request->input('txtNombre'),
                'email' => $request->input('txtEmail'),
                'telefono' => $request->input('txtTelefono'),
                'idCarrera' => $request->input('txtIdCarrera'),
            ]);
        return redirect()->route('alumno.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('alumno')
            ->where('idAlumno', '=', $id)
            ->delete();
        return redirect()->route('alumno.index');
    }
}