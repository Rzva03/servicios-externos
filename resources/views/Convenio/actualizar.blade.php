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
                        <form action="{{ route('convenio.update', $convenios->idConvenio) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="mb-3">
                                <label for="txtFolio" class="form-label">FOLIO</label>
                                <input type="text" class="form-control" name="txtFolio" id="txtFolio"
                                    value="{{ $convenios->folio }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="dateFechaFirma" class="form-label">FECHA DE FIRMA</label>
                                <input type="date" class="form-control" name="dateFechaFirma" id="txtFechaF"
                                    value="{{ $convenios->fechaFirma }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="dateFechaVigencia" class="form-label">FECHA DE VIGENCIA</label>
                                <input type="date" class="form-control" name="dateFechaVigencia" id="txtFechaV"
                                    value="{{ $convenios->fechaVigencia }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="txtFolio" class="form-label">URL DEL CONVENIO</label>
                                <input type="text" class="form-control" name="txtUrlConvenio" id="txtUrlConvenio"
                                    value="{{ $convenios->urlConvenio }}" required>
                            </div>
                            <div class="form-group">
                                <label for="sltEstatus" class="form-label">ESTATUS</label>
                                <select name="sltEstatus" id="sltEstatus" class="form-control"
                                    onChange="agregarID(sltEstatus, txtEstatus)" required>
                                    @if ($convenios->estatus === 'VIGENTE')
                                        <option>ELIJA EL ESTATUS</option>
                                        <option selected value="VIGENTE">VIGENTE</option>
                                        <option value="FINALIZADO">FINALIZADO</option>
                                        <option value="CANCELADO">CANCELADO</option>
                                    @elseif ($convenios->estatus === 'FINALIZADO')
                                        <option>ELIJA EL ESTATUS</option>
                                        <option value="VIGENTE">VIGENTE</option>
                                        <option selected value="FINALIZADO">FINALIZADO</option>
                                        <option value="CANCELADO">CANCELADO</option>
                                    @else
                                        <option>ELIJA EL ESTATUS</option>
                                        <option value="VIGENTE">VIGENTE</option>
                                        <option value="FINALIZADO">FINALIZADO</option>
                                        <option selected value="CANCELADO">CANCELADO</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sltTipo" class="form-label">TIPO DE CONVENIO</label>
                                <select name="sltTipo" id="sltTipo" class="form-control"
                                    onChange="agregarID(sltTipo, txtIdTipoCon)" required>
                                    <option>ELIJA EL TIPO DE CONVENIO</option>
                                    @foreach ($tipoConvenios as $tipocon)
                                        @if ($tipocon->idTipoConvenio === $convenios->idTipoCon)
                                            <option selected value="{{ $tipocon->idTipoConvenio }}">
                                                {{ $tipocon->nomTipoConvenio }}
                                            </option>
                                        @else
                                            <option value="{{ $tipocon->idTipoConvenio }}">
                                                {{ $tipocon->nomTipoConvenio }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sltInstancia" class="form-label">INSTANCIA</label>
                                <select name="sltInstancia" id="sltInstancia" class="form-control"
                                    onChange="agregarID(sltInstancia, txtIdInstancia)" required>
                                    <option>ELIJA LA INSTANCIA</option>
                                    @foreach ($instancias as $instancia)
                                        @if ($instancia->idInstancia === $convenios->idInstancia)
                                            <option selected value="{{ $instancia->idInstancia }}">
                                                {{ $instancia->nombre }}
                                            </option>
                                        @else
                                            <option value="{{ $instancia->idInstancia }}">{{ $instancia->nombre }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sltIndicador" class="form-label">INDICADOR</label>
                                <select name="sltIndicador" id="sltIndicador" class="form-control"
                                    onChange="agregarID(sltIndicador, txtIdIndicador)" required>
                                    <option>ELIJA EL INDICADOR</option>
                                    @foreach ($indicadores as $indicador)
                                        @if ($indicador->idIndicador === $convenios->idIndicador)
                                            <option selected value="{{ $indicador->idIndicador }}">
                                                {{ $indicador->descripcion }}
                                            </option>
                                        @else
                                            <option value="{{ $indicador->idIndicador }}">
                                                {{ $indicador->descripcion }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">CARRERA</label>
                                <div class="div-flex">
                                    @foreach ($carreras as $carrera)
                                        <div class="form-check col-3">
                                            <input class="form-check-input" type="checkbox"
                                                onclick='crearArregloCarrera(flexCheckChecked_{{ $carrera->idCarrera }})'
                                                value="{{ $carrera->idCarrera }}"
                                                id="flexCheckChecked_{{ $carrera->idCarrera }}">
                                            <label class="form-check-label"
                                                for="flexCheckChecked_{{ $carrera->idCarrera }}">
                                                {{ $carrera->nomCarrera }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <div class="form-check col-3">
                                        <input class="form-check-input" type="checkbox"
                                            onclick='obtenerTodasCarreras({{ $carreras }})'
                                            id="flexCheckChecked_todasCarreras">
                                        <label class="form-check-label" for="flexCheckChecked_todasCarreras">
                                            TODAS LAS CARRERAS
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <input hidden type="text" name="txtCarreras" id="txtCarreras"
                                value="{{ $convenios->carreras }}">
                            <input hidden type="text" name="txtIdConvenio" id="txtIdConvenio"
                                value="{{ $convenios->idConvenio }}">
                            <input hidden type="text" name="txtEstatus" id="txtEstatus"
                                value="{{ $convenios->estatus }}">
                            <input hidden type="text" name="txtIdTipoCon" id="txtIdTipoCon"
                                value="{{ $convenios->idTipoCon }}">
                            <input hidden type="text" name="txtIdInstancia" id="txtIdInstancia"
                                value="{{ $convenios->idInstancia }}">
                            <input hidden type="text" name="txtIdIndicador" id="txtIdIndicador"
                                value="{{ $convenios->idIndicador }}">
                            <input hidden type="text" name="txtIdUsuario" id="txtIdUsuario"
                                value=" {{ Auth::user()->id }}">
                            <button type="submit" class="btn btn-primary">MODIFICAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
