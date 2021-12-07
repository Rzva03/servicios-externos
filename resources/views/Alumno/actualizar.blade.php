@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('MODIFICAR ALUMNO') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('alumno.update', $alumnos->idAlumno) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="mb-3">
                                <label for="txtNombre" class="form-label">NOMBRE</label>
                                <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                                    value="{{ $alumnos->nombre }}"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="mb-3">
                                <label for="txtEmail" class="form-label">EMAIL</label>
                                <input type="text" class="form-control" name="txtEmail" id="txtEmail"
                                    value="{{ $alumnos->email }}"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="mb-3">
                                <label for="txtTelefono" class="form-label">TELÉFONO</label>
                                <input type="text" class="form-control" name="txtTelefono" id="txtTelefono"
                                    value="{{ $alumnos->telefono }}"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="sltCarrera" class="form-label">CARRERA</label>
                                <select name="sltCarrera" class="form-select"
                                    onChange="agregarID(sltCarrera, txtIdCarrera)" required>
                                    <option>ELIJA LA CARRERA</option>
                                    @foreach ($carreras as $carrera)
                                        @if ($carrera->idCarrera === $alumnos->idCarrera)
                                            <option selected value="{{ $carrera->idCarrera }}">
                                                {{ $carrera->nomCarrera }}
                                            </option>
                                        @else
                                            <option value="{{ $carrera->idCarrera }}">
                                                {{ $carrera->nomCarrera }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <input hidden type="text" name="txtIdCarrera" id="txtIdCarrera"
                                value="{{ $alumnos->idCarrera }}">
                            <button type="submit" class="btn btn-primary">MODIFICAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
