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
                                <input type="date" class="form-control" name="dateFechaFirma" id="dateFechaFirma"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="mb-3">
                                <label for="txtFechaV" class="form-label">FECHA DE VIGENCIA</label>
                                <input type="date" class="form-control" name="dateFechaVigencia" id="dateFechaVigencia"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="form-group">
                                <label for="sltEstatus" class="form-label">ESTATUS</label>
                                <select name="sltEstatus" id="sltEstatus" class="form-control"
                                    onChange="agregarID(sltEstatus, txtEstatus)" required>
                                    <option selected>ELIJA EL ESTATUS</option>
                                    <option value="VIGENTE">VIGENTE</option>
                                    <option value="FINALIZADO">FINALIZADO</option>
                                    <option value="CANCELADO">CANCELADO</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="txtUrlConvenio" class="form-label">URL DEL CONVENIO DIGITAL</label>
                                <input type="url" class="form-control" name="txtUrlConvenio" id="txtUrlConvenio"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="form-group">
                                <label for="sltTipo" class="form-label">TIPO DE CONVENIO</label>
                                <select name="sltTipo" id="sltTipo" class="form-control"
                                    onChange="agregarID(sltTipo, txtIdTipoCon)" required>
                                    <option selected>ELIJA EL TIPO DE CONVENIO</option>
                                    @foreach ($tiposConvenios as $tipocon)
                                        <option value="{{ $tipocon->idTipoConvenio }}">{{ $tipocon->nomTipoConvenio }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sltInstancia" class="form-label">INSTANCIA</label>
                                <select name="sltInstancia" id="sltInstancia" class="form-control"
                                    onChange="agregarID(sltInstancia, txtIdInstancia)" required>
                                    <option selected>ELIJA LA INSTANCIA</option>
                                    @foreach ($instancias as $instancia)
                                        <option value="{{ $instancia->idInstancia }}">{{ $instancia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sltIndicador" class="form-label">INDICADOR</label>
                                <select name="sltIndicador" id="sltIndicador" class="form-control"
                                    onChange="agregarID(sltIndicador, txtIdIndicador)" required>
                                    <option selected>ELIJA EL INDICADOR</option>
                                    @foreach ($indicadores as $indicador)
                                        <option value="{{ $indicador->idIndicador }}">{{ $indicador->descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="div">
                                <label for="" class="form-label">CARRERA</label>
                                <div class="div-flex">
                                    @foreach ($carreras as $carrera)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                onclick='crearArregloCarrera({{ $carrera->idCarrera }})'
                                                value="{{ $carrera->idCarrera }}"
                                                id="flexCheckChecked_{{ $carrera->idCarrera }}">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                {{ $carrera->nomCarrera }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{-- @if ($convenios === 1)
                                <input hidden type="text" name="txtIdConvenio" id="txtIdConvenio" value="1">
                            @else
                                <input hidden type="text" name="txtIdConvenio" id="txtIdConvenio"
                                    value="{{ $convenios }}">
                            @endif --}}
                            <input type="text" name="txtCarreras" id="txtCarreras">
                            <input hidden type="text" name="txtIdIndicador" id="txtIdIndicador">
                            <input hidden type="text" name="txtEstatus" id="txtEstatus">
                            <input hidden type="text" name="txtIdTipoCon" id="txtIdTipoCon">
                            <input hidden type="text" name="txtIdInstancia" id="txtIdInstancia">
                            <input hidden type="text" name="txtIdUsuario" id="txtIdUsuario"
                                value=" {{ Auth::user()->id }}">
                            <button type="submit" class="btn btn-primary">AGREGAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
