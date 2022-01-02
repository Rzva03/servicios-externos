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
                        <form method="POST" action="{{ route('convenio.store') }}" class="needs-validation" novalidate>
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="txtFolio" class="form-label">FOLIO</label>
                                <input type="text" class="form-control" name="txtFolio" id="txtFolio"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="mb-3">
                                <label for="dateFechaFirma" class="form-label">FECHA DE FIRMA</label>
                                <input type="date" class="form-control" name="dateFechaFirma" id="dateFechaFirma"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <div class="form-group">
                                <label for="sltTipoFecha" class="form-label">TIPO DE FECHA DE VIGENCIA</label>
                                <select name="sltTipoFecha" id="sltTipoFecha" class="form-select"
                                    onChange="validarTipoFecha(sltTipoFecha)" required>
                                    <option selected disabled value="">ELIJA EL TIPO DE FECHA</option>
                                    <option value="NO">POR FECHA</option>
                                    <option value="SI">INDEFINIDO</option>
                                </select>
                            </div>
                            <div hidden class="mb-3" id="divFechaVigencia">
                                <label for="dateFechaVigencia" class="form-label">FECHA DE VIGENCIA</label>
                                <input type="date" class="form-control" name="dateFechaVigencia" id="dateFechaVigencia"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </div>
                            <div class="form-group">
                                <label for="sltEstatus" class="form-label">ESTATUS</label>
                                <select name="sltEstatus" id="sltEstatus" class="form-select"
                                    onChange="agregarID(sltEstatus, txtEstatus)" required>
                                    <option selected disabled value="">ELIJA EL ESTATUS</option>
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
                                <select name="sltTipo" id="sltTipo" class="form-select"
                                    onChange="agregarIdOcultarMarco(sltTipo, txtIdTipoCon)" required>
                                    <option selected disabled value="">ELIJA EL TIPO DE CONVENIO</option>
                                    @foreach ($tiposConvenios as $tipocon)
                                        <option value="{{ $tipocon->idTipoConvenio }}">{{ $tipocon->nomTipoConvenio }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" id="divIndicador">
                            </div>
                            <div class="form-group">
                                <label for="sltInstancia" class="form-label">INSTANCIA</label>
                                <select name="sltInstancia" id="sltInstancia" class="form-select"
                                    onChange="agregarID(sltInstancia, txtIdInstancia)" required>
                                    <option selected disabled value="">ELIJA LA INSTANCIA</option>
                                    @foreach ($instancias as $instancia)
                                        <option value="{{ $instancia->idInstancia }}">{{ $instancia->nombre }}</option>
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
                            <input hidden type="text" name="txtTipoFecha" id="txtTipoFecha">
                            <input hidden type="text" name="txtCarreras" id="txtCarreras">
                            <input hidden type="text" name="txtIdIndicador" id="txtIdIndicador">
                            <input hidden type="text" name="txtEstatus" id="txtEstatus">
                            <input hidden type="text" name="txtIdTipoCon" id="txtIdTipoCon">
                            <input hidden type="text" name="txtIdInstancia" id="txtIdInstancia">
                            <input hidden type="text" name="txtIdUsuario" id="txtIdUsuario"
                                value=" {{ Auth::user()->id }}">
                            <div class="row g-3">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-plus-square-dotted"></i>
                                    AGREGAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let txtTipoFecha = document.getElementById("txtTipoFecha");
        let divFechaVigencia = document.getElementById("divFechaVigencia");
        let fechaVigencia = document.getElementById("dateFechaVigencia");

        function validarTipoFecha(idSelector) {
            let valorSeleccionado = idSelector.value;
            if (valorSeleccionado == "SI") { //indefinido
                // fechaVigencia.required = true;
                // divFechaVigencia.removeAttribute("hidden");
                // txtTipoFecha.value = "SI";
                divFechaVigencia.setAttribute("hidden", "");
                fechaVigencia.removeAttribute("required");
                txtTipoFecha.value = "SI";
            } else {
                // divFechaVigencia.setAttribute("hidden", "");
                // fechaVigencia.removeAttribute("required");
                // txtTipoFecha.value = "NO";
                fechaVigencia.required = true;
                divFechaVigencia.removeAttribute("hidden");
                txtTipoFecha.value = "NO";
            }

        }

        function agregarIdOcultarMarco(idSelector, idInput) {
            let valorSeleccionado = idSelector.value;
            idInput.value = valorSeleccionado;
            let divIndicador = document.getElementById("divIndicador"),
                indicador = "";
            if (valorSeleccionado === "3") {
                indicador = `<label for="sltIndicador" class="form-label">INDICADOR</label>
                                <select name="sltIndicador" id="sltIndicador" class="form-select"
                                    onChange="agregarID(sltIndicador, txtIdIndicador)">
                                    <option selected disabled value="">ELIJA EL INDICADOR</option>
                                    @foreach ($indicadores as $indicador)
                                        <option value="{{ $indicador->idIndicador }}">{{ $indicador->descripcion }}
                                        </option>
                                    @endforeach
                                </select>`;
            } else {
                indicador = "";
            }
            divIndicador.innerHTML = indicador;
        }
    </script>
@endsection
