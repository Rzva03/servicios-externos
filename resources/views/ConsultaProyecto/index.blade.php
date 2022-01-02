@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('REPORTE PROYECTO') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3 class="text-center">REPORTE DE LOS PROYECTOS</h3>
                        <form action="{{ route('consulta-proyecto.index') }}" method="GET" class="needs-validation"
                            novalidate>
                            <div class="div-flex">
                                <div class="form-group col-3 text-left">
                                    <label for="sltPeriodo" class="form-label">PERIODO</label>
                                    <select name="sltPeriodo" id="sltPeriodo" class="form-select" required>
                                        @if ($periodoRequest === null)
                                            <option selected disabled value="">ELIJA EL PERIODO</option>
                                            @foreach ($periodos as $periodo)
                                                <option value="{{ $periodo->idPeriodo }}">
                                                    {{ $periodo->periodo }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option>ELIJA EL PERIODO</option>
                                            @foreach ($periodos as $periodo)
                                                @if ($periodo->idPeriodo == $periodoRequest)
                                                    <option selected value="{{ $periodo->idPeriodo }}">
                                                        {{ $periodo->periodo }}
                                                    </option>
                                                @else
                                                    <option value="{{ $periodo->idPeriodo }}">
                                                        {{ $periodo->periodo }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-3 text-left">
                                    <label for="sltModalidad" class="form-label">MODALIDAD</label>
                                    <select name="sltModalidad" id="sltPeriodo" class="form-select" required>
                                        @if ($modalidadRequest === null)
                                            <option selected disabled value="">ELIJA LA MODALIDAD</option>
                                            <option value="SERVICIO SOCIAL">SERVICIO SOCIAL</option>
                                            <option value="RESIDENCIA PROFESIONAL">RESIDENCIA PROFESIONAL</option>
                                        @else
                                            <option>ELIJA LA MODALIDAD</option>
                                            @if ('SERVICIO SOCIAL' == $modalidadRequest)
                                                <option selected value="SERVICIO SOCIAL">SERVICIO SOCIAL</option>
                                                <option value="RESIDENCIA PROFESIONAL">RESIDENCIA PROFESIONAL</option>
                                            @else
                                                <option value="SERVICIO SOCIAL">SERVICIO SOCIAL</option>
                                                <option selected value="RESIDENCIA PROFESIONAL">RESIDENCIA PROFESIONAL
                                                </option>
                                            @endif
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-8 text-left">
                                    <label for="sltInstancia" class="form-label">INSTANCIA</label>
                                    <select name="sltInstancia" id="sltPeriodo" class="form-select" required>
                                        @if ($instanciaRequest === null)
                                            <option selected disabled value="">ELIJA LA INSTANCIA</option>
                                            @foreach ($instancias as $instancia)
                                                <option value="{{ $instancia->idInstancia }}">
                                                    {{ $instancia->nombre }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option>ELIJA LA INSTANCIA</option>
                                            @foreach ($instancias as $instancia)
                                                @if ($instancia->idInstancia == $instanciaRequest)
                                                    <option selected value="{{ $instancia->idInstancia }}">
                                                        {{ $instancia->nombre }}
                                                    </option>
                                                @else
                                                    <option value="{{ $instancia->idInstancia }}">
                                                        {{ $instancia->nombre }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            {{-- <input hidden value="{{ $fechaInicio }}" type="text" name="txtFechaInicial" required
                                id="txtFechaInicial">
                            <input hidden value="{{ $fechaFinal }}" type="text" name="txtFechaFinal" id="txtFechaFinal"
                                required> --}}
                            <div class="div-center">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-table"></i>
                                    OBTENER</button>
                            </div>
                        </form>
                        <br>
                        <input hidden type="text" id="modalidadRequest" value="{{ $modalidadRequest }}">
                        <table hidden class="table table-hover col-9 table-center" id="tablaProyectos">
                            <thead>
                                <tr>
                                    <th scope="col">ALUMNO</th>
                                    <th scope="col">PROYECTO</th>
                                    <th scope="col">ASESOR INTERNO</th>
                                    <th scope="col">ASESOR EXTERNO</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($proyectoCount == 0)
                                    <tr>
                                        <td colspan="4">NO HAY PROYECTOS</td>
                                    </tr>
                                @else
                                    @foreach ($proyectos as $proyecto)
                                        <tr>
                                            @foreach ($alumnos as $alumno)
                                                @if ($alumno->idAlumno === $proyecto->idAlumno)
                                                    <td> {{ $alumno->nombre }} </td>
                                                @endif
                                            @endforeach
                                            <td> {{ $proyecto->nomProyecto }} </td>
                                            @if ($proyecto->idAsesorI == null)
                                                <td> SIN ASESOR INTERNO</td>
                                            @else
                                                @foreach ($asesoresInternos as $asesorInterno)
                                                    @if ($asesorInterno->idAsesorI === $proyecto->idAsesorI)
                                                        <td> {{ $asesorInterno->nombre }} </td>
                                                    @endif
                                                @endforeach
                                            @endif
                                            @if ($proyecto->idAsesorE == null)
                                                <td> SIN ASESOR EXTERNO</td>
                                            @else
                                                @foreach ($asesoresExternos as $asesorExterno)
                                                    @if ($asesorExterno->idAsesorE === $proyecto->idAsesorE)
                                                        <td> {{ $asesorExterno->nombre }} </td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </tr>
                                    @endforeach
                                    {{-- @foreach ($alumnos as $alumno)
                                            @if ($alumno->idAlumno == $proyectos->idAlumno)
                                                <td> {{ $alumno->nombre }} </td>
                                            @endif
                                        @endforeach
                                        <td> {{ $proyectos->nomProyecto }} </td>
                                        @if ($proyectos->idAsesorI == null)
                                            <td> SIN ASESOR INTERNO</td>
                                        @else
                                            @foreach ($asesoresInternos as $asesorInterno)
                                                @if ($asesorInterno->idAsesorI === $proyectos->idAsesorI)
                                                    <td> {{ $asesorInterno->nombre }} </td>
                                                @endif
                                            @endforeach
                                        @endif
                                        @if ($proyectos->idAsesorE == null)
                                            <td> SIN ASESOR EXTERNO</td>
                                        @else
                                            @foreach ($asesoresExternos as $asesorExterno)
                                                @if ($asesorExterno->idAsesorE === $proyectos->idAsesorE)
                                                    <td> {{ $asesorExterno->nombre }} </td>
                                                @endif
                                            @endforeach
                                        @endif --}}
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            /* -------------------------------------------------------------------------- */
            /*                    Validar tabla en reporte indicadores                    */
            /* -------------------------------------------------------------------------- */
            window.onload = function() {
                validarTablaProyecto();
            };

            function validarTablaProyecto() {
                let modalidad = document.getElementById("modalidadRequest").value;
                let tablaProyectos = document.getElementById("tablaProyectos");
                if (modalidad != "") {
                    tablaProyectos.removeAttribute("hidden");
                }
            }
        </script>
    @endsection
