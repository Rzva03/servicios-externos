@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('CONVENIO') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('convenioupdate', $convenios->idConvenio) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="mb-3">
                                <label for="txtFolio" class="form-label">Folio</label>
                                <input type="text" class="form-control" name="txtFolio" id="txtFolio"
                                    value="{{ $convenios->convenio }}">
                            </div>
                            <div class="mb-3">
                                <label for="txtNombre" class="form-label">Nombre del convenio</label>
                                <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                                    value="{{ $convenios->convenio }}">
                            </div>
                            <div class="mb-3">
                                <label for="txtFechaF" class="form-label">Fecha de firma</label>
                                <input type="text" class="form-control" name="txtFechaF" id="txtFechaF"
                                    value="{{ $convenios->convenio }}">
                            </div>
                            <div class="mb-3">
                                <label for="txtFechaV" class="form-label">Fecha de vigencia</label>
                                <input type="text" class="form-control" name="txtFechaV" id="txtFechaV"
                                    value="{{ $convenios->convenio }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
