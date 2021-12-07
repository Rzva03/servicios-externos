@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('MODIFICAR PROYECTO') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('proyecto.update', $proyectos->idProyecto) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="mb-3">
                                <label for="txtNombre" class="form-label">NOMBRE PROYECTO</label>
                                <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                                    value="{{ $proyectos->nomProyecto }}"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="form-group">
                                <label for="sltModalidad" class="form-label">MODALIDAD</label>
                                <select name="sltModalidad" id="sltModalidad" class="form-select"
                                    onChange="agregarID(sltModalidad, txtModalidad)" required>
                                    <option>ELIJA LA MODALIDAD</option>
                                    @if ($proyectos->modalidad === 'SERVICIO SOCIAL')
                                        <option selected value="SERVICIO SOCIAL">SERVICIO SOCIAL</option>
                                        <option value="RESIDENCIA PROFESIONAL">RESIDENCIA PROFESIONAL</option>
                                    @else
                                        <option value="SERVICIO SOCIAL">SERVICIO SOCIAL</option>
                                        <option selected value="RESIDENCIA PROFESIONAL">RESIDENCIA PROFESIONAL</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sltPeriodo" class="form-label">PERIODO</label>
                                <select name="sltPeriodo" class="form-select"
                                    onChange="agregarID(sltPeriodo, txtIdPeriodo)" required>
                                    <option selected>ElIJA UN PERIODO</option>
                                    @foreach ($periodos as $periodo)
                                        @if ($periodo->idPeriodo === $proyectos->idPeriodo)
                                            <option selected value="{{ $periodo->idPeriodo }}">{{ $periodo->periodo }}
                                            </option>
                                        @else
                                            <option value="{{ $periodo->idPeriodo }}">{{ $periodo->periodo }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sltAlumno" class="form-label">ALUMNO</label>
                                <select name="sltAlumno" class="form-select" onChange="agregarID(sltAlumno, txtIdAlumno)"
                                    required>
                                    <option>ELIJA ALUMNO</option>
                                    @foreach ($alumnos as $alumno)
                                        @if ($alumno->idAlumno === $proyectos->idAlumno)
                                            <option selected value="{{ $alumno->idAlumno }}">{{ $alumno->nombre }}
                                            </option>
                                        @else
                                            <option value="{{ $alumno->idAlumno }}">{{ $alumno->nombre }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sltAsesorI" class="form-label">ASESOR INTERNO</label>
                                <select name="sltAsesorI" class="form-select"
                                    onChange="agregarID(sltAsesorI, txtIdAsesorInterno)" required>
                                    <option>ELIJA ASESOR INTERNO</option>
                                    @foreach ($asesoresInternos as $asesorInterno)
                                        @if ($asesorInterno->idAsesorI === $proyectos->idAsesorI)
                                            <option selected value="{{ $asesorInterno->idAsesorI }}">
                                                {{ $asesorInterno->nombre }}
                                            </option>
                                        @else
                                            <option value="{{ $asesorInterno->idAsesorI }}">
                                                {{ $asesorInterno->nombre }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sltAsesorE" class="form-label">ASESOR EXTERNO</label>
                                <select name="sltAsesorE" class="form-select"
                                    onChange="agregarID(sltAsesorE, txtIdAsesorExterno)" required>
                                    <option>ELIJA ASESOR EXTERNO</option>
                                    @foreach ($asesoresExternos as $asesorExterno)
                                        @if ($asesorExterno->idAsesorE === $proyectos->idAsesorE)
                                            <option selected value="{{ $asesorExterno->idAsesorE }}">
                                                {{ $asesorExterno->nombre }}
                                            </option>
                                        @else
                                            <option value="{{ $asesorExterno->idAsesorE }}">
                                                {{ $asesorExterno->nombre }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sltInstancia" class="form-label">INSTANCIA</label>
                                <select name="sltInstancia" class="form-select"
                                    onChange="agregarID(sltInstancia, txtIdInstancia)" required>
                                    <option>ELIJA INSTANCIA</option>
                                    @foreach ($instancias as $instancia)
                                        @if ($instancia->idInstancia === $proyectos->idInstancia)
                                            <option selected value="{{ $instancia->idInstancia }}">
                                                {{ $instancia->nombre }}</option>
                                        @else
                                            <option value="{{ $instancia->idInstancia }}">{{ $instancia->nombre }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <input hidden type="text" name="txtModalidad" id="txtModalidad"
                                value="{{ $proyectos->modalidad }}">
                            <input hidden type="text" name="txtIdPeriodo" id="txtIdPeriodo"
                                value="{{ $proyectos->idPeriodo }}">
                            <input hidden type="text" name="txtIdAlumno" id="txtIdAlumno"
                                value="{{ $proyectos->idAlumno }}">
                            <input hidden type="text" name="txtIdAsesorInterno" id="txtIdAsesorInterno"
                                value="{{ $proyectos->idAsesorI }}">
                            <input hidden type="text" name="txtIdAsesorExterno" id="txtIdAsesorExterno"
                                value="{{ $proyectos->idAsesorE }}">
                            <input hidden type="text" name="txtIdInstancia" id="txtIdInstancia"
                                value="{{ $proyectos->idInstancia }}">
                            <button type="submit" class="btn btn-primary">MODIFICAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
