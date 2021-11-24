@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('LISTADO DE PROYECTOS') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="div-flex">
                            <button onclick="location.href='{{ route('proyecto.create') }}'"
                                class="btn btn-primary ">NUEVO</button>
                            <div class="input-group col-5">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                <input id="busqueda" type="text" class="form-control" placeholder="BÚSQUEDA"
                                    style="text-transform: uppercase;" onkeyup='busquedaTabla()'>
                            </div>
                        </div>
                        <table class="table" id="tabla">
                            <thead>
                                <tr>
                                    <th scope="col">NOMBRE DEL PROYECTO</th>
                                    <th scope="col">MODALIDAD</th>
                                    <th scope="col">ALUMNO</th>
                                    <th scope="col">PERIODO</th>
                                    <th scope="col">ASESOR INTERNO</th>
                                    <th scope="col">ASESOR EXTERNO</th>
                                    <th scope="col">INSTANCIA</th>
                                    <th scope="col">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proyectos as $proyecto)
                                    <tr>
                                        <td> {{ $proyecto->nomProyecto }} </td>
                                        @if ($proyecto->modalidad === 'SERVICIO SOCIAL')
                                            <td> SERVICIO SOCIAL </td>
                                        @else
                                            <td> RESIDENCIA PROFESIONAL </td>
                                        @endif
                                        @foreach ($alumnos as $alumno)
                                            @if ($alumno->idAlumno === $proyecto->idAlumno)
                                                <td> {{ $alumno->nombre }} </td>
                                            @endif
                                        @endforeach
                                        @foreach ($periodos as $periodo)
                                            @if ($periodo->idPeriodo === $proyecto->idPeriodo)
                                                <td> {{ $periodo->periodo }} </td>
                                            @endif
                                        @endforeach
                                        @foreach ($asesoresInternos as $asesorInterno)
                                            @if ($asesorInterno->idAsesorI === $proyecto->idAsesorI)
                                                <td> {{ $asesorInterno->nombre }} </td>
                                            @endif
                                        @endforeach
                                        @foreach ($asesoresExternos as $asesorExterno)
                                            @if ($asesorExterno->idAsesorE === $proyecto->idAsesorE)
                                                <td> {{ $asesorExterno->nombre }} </td>
                                            @endif
                                        @endforeach
                                        @foreach ($instancias as $instancia)
                                            @if ($instancia->idInstancia === $proyecto->idInstancia)
                                                <td> {{ $instancia->nombre }} </td>
                                            @endif
                                        @endforeach
                                        <td>
                                            <div style="display: flex; justify-content: start;">
                                                <button style="margin-right: 1rem"
                                                    onclick="location.href='{{ route('proyecto.edit', $proyecto->idProyecto) }}'"
                                                    class="btn btn-outline-primary">MODIFICAR</button>
                                                <form action="{{ route('proyecto.destroy', $proyecto->idProyecto) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm( '¿ESTÁ SEGURO DE ELIMINAR {{ $proyecto->nomProyecto }}?') ">ELIMINAR</button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
