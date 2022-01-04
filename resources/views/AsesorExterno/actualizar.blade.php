@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('MODIFICAR ASESOR EXTERNO') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('asesor-externo.update', $asesoresExternos->idAsesorE) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="mb-3">
                                <label for="txtNombre" class="form-label">NOMBRE</label>
                                <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                                    value="{{ $asesoresExternos->nombre }}"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="mb-3">
                                <label for="txtEmail" class="form-label">EMAIL</label>
                                <input type="text" class="form-control" name="txtEmail" id="txtEmail"
                                    value="{{ $asesoresExternos->email }}"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="mb-3">
                                <label for="txtTelefono" class="form-label">TELÉFONO</label>
                                <input type="text" class="form-control" name="txtTelefono" id="txtTelefono"
                                    value="{{ $asesoresExternos->telefono }}"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="row g-3">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-eraser"></i>
                                    MODIFICAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
