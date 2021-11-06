@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('ALUMNO') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('alumno.store') }}" id="form" name="form">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="txtNombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="mb-3">
                                <label for="txtEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" name="txtEmail" id="txtEmail"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="mb-3">
                                <label for="txtTelefono" class="form-label">Telefono</label>
                                <input type="text" class="form-control" name="txtTelefono" id="txtTelefono"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <br>
                            <div class="mb-3">
                                <label for="sltCarrera" class="form-label">Carrera:</label>
                                <select name="sltCarrera" class="form-select form-select-lg mb-3"
                                    onChange="agregarID(sltCarrera, txtIdCarrera)" required>
                                    <option selected>Elija la carrera</option>
                                    @foreach ($carreras as $carrera)
                                        <option value="{{ $carrera->idCarrera }}">
                                            {{ $carrera->nomCarrera }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <input hidden type="text" name="txtIdCarrera" id="txtIdCarrera">
                            <br>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
