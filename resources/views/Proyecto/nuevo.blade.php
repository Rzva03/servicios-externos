@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('AGREGAR PROYECTO') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('proyecto.store') }}">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="txtNombre" class="form-label">Nombre del proyecto</label>
                                <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="mb-3">
                                <label for="txtModalidad" class="form-label">Modalidad</label>
                                <input type="text" class="form-control" name="txtModalidad" id="txtModalidad"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <br>
                            <select name="sltPeriodo" class="form-select form-select-lg mb-3"
                                aria-label=".form-select-lg example" required>
                                <option selected>Elija un periodo</option>
                                @foreach ($periodos as $periodo)
                                    <option value="{{ $periodo->idPeriodo }}">{{ $periodo->periodo }}</option>
                                @endforeach
                            </select>
                            <br>
                            <select name="sltAlumno" class="form-select form-select-lg mb-3"
                                aria-label=".form-select-lg example" required>
                                <option selected>Elija alumno</option>
                                @foreach ($alumnos as $alumno)
                                    <option value="{{ $alumno->idAlumno }}">{{ $alumno->nombre }}</option>
                                @endforeach
                            </select>
                            <br>
                            <select name="sltAsesorI" class="form-select form-select-lg mb-3"
                                aria-label=".form-select-lg example" required>
                                <option selected>Eliga el asesor interno</option>
                                @foreach ($asesoresInternos as $asesorInterno)
                                    <option value="{{ $asesorinterno->idAsesorI }}">{{ $asesorinterno->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            <br>
                            <select name="sltAsesorE" class="form-select form-select-lg mb-3"
                                aria-label=".form-select-lg example" required>
                                <option selected>Eliga el asesor externo</option>
                                @foreach ($asesoresExternos as $asesorExterno)
                                    <option value="{{ $asesorexterno->idAsesorE }}">{{ $asesorexterno->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            <br>
                            <select name="sltInstancia" class="form-select form-select-lg mb-3"
                                aria-label=".form-select-lg example" required>
                                <option selected>Eliga la instancia</option>
                                @foreach ($instancias as $instancia)
                                    <option value="{{ $instancia->idInstancia }}">{{ $instancia->nombre }}</option>
                                @endforeach
                            </select>
                            <br>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
