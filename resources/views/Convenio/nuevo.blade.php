@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('AGREGAR CONVENIO') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('convenio.store') }}">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="txtFolio" class="form-label">FOLIO</label>
                                <input type="text" class="form-control" name="txtFolio" id="txtFolio"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="mb-3">
                                <label for="txtFechaF" class="form-label">FECHA DE FIRMA</label>
                                <input type="text" class="form-control" name="txtFechaF" id="txtFechaF"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="mb-3">
                                <label for="txtFechaV" class="form-label">FECHA DE VIGENCIA</label>
                                <input type="text" class="form-control" name="txtFechaV" id="txtFechaV"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <br>
                            <select name="sltTipo" class="form-select form-select-lg mb-3"
                                aria-label=".form-select-lg example" required>
                                <option selected>ELIJA EL TIPO DE CONVENIO</option>
                                @foreach ($tiposConvenios as $tipocon)
                                    <option value="{{ $tipocon->idTipoConvenio }}">{{ $tipocon->nomTipoConvenio }}
                                    </option>
                                @endforeach
                            </select>
                            <br>
                            <select name="sltInstancia" class="form-select form-select-lg mb-3"
                                aria-label=".form-select-lg example" required>
                                <option selected>ELIJA LA INSTANCIA</option>
                                @foreach ($instancias as $instancia)
                                    <option value="{{ $instancia->idInstancia }}">{{ $instancia->nombre }}</option>
                                @endforeach
                            </select>
                            <br>
                            <button type="submit" class="btn btn-primary">AGREGAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
