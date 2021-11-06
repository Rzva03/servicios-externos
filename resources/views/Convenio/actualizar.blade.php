@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('MODIFICAR CONVENIO') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('convenioupdate', $convenios->idConvenio) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="mb-3">
                                <label for="txtFolio" class="form-label">FOLIO</label>
                                <input type="text" class="form-control" name="txtFolio" id="txtFolio"
                                    value="{{ $convenios->convenio }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="txtFechaF" class="form-label">FECHA DE FIRMA</label>
                                <input type="text" class="form-control" name="txtFechaF" id="txtFechaF"
                                    value="{{ $convenios->convenio }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="txtFechaV" class="form-label">FECHA DE VIGENCIA</label>
                                <input type="text" class="form-control" name="txtFechaV" id="txtFechaV"
                                    value="{{ $convenios->convenio }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="txtEstatus" class="form-label">ESTATUS</label>
                                <input type="text" class="form-control" name="txtEstatus" id="txtEstatus"
                                    value="{{ $convenios->convenio }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">MODIFICAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
