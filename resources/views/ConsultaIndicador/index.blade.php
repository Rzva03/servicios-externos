@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('REPORTE INDICADOR') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3 class="text-center">CALCULAR INDICADORES POR TRIMESTRE</h3>
                        <form action="{{ route('consulta-indicador.index') }}" method="GET" class="needs-validation"
                            novalidate>
                            <div class="div-flex">
                                <div class="form-group col-4">
                                    <label for="sltTrimestre" class="form-label">TRIMESTRE</label>
                                    @switch($trimestreRequest)
                                        @case(' 1')
                                            <select name="sltTrimestre" id="sltTrimestre" class="form-select"
                                                onChange="convertirFechaPorTrimestre(sltTrimestre)" required>
                                                <option>ELIJA EL TRIMESTRE</option>
                                                <option selected value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        @break
                                        @case(' 2')
                                            <select name="sltTrimestre" id="sltTrimestre" class="form-select"
                                                onChange="convertirFechaPorTrimestre(sltTrimestre)" required>
                                                <option>ELIJA EL TRIMESTRE</option>
                                                <option value="1">1</option>
                                                <option selected value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        @break
                                        @case(' 3')
                                            <select name="sltTrimestre" id="sltTrimestre" class="form-select"
                                                onChange="convertirFechaPorTrimestre(sltTrimestre)" required>
                                                <option>ELIJA EL TRIMESTRE</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option selected value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        @break
                                        @case(' 4')
                                            <select name="sltTrimestre" id="sltTrimestre" class="form-select"
                                                onChange="convertirFechaPorTrimestre(sltTrimestre)" required>
                                                <option>ELIJA EL TRIMESTRE</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option selected value="4">4</option>
                                            </select>
                                        @break
                                        @default
                                            <select name="sltTrimestre" id="sltTrimestre" class="form-select"
                                                onChange="convertirFechaPorTrimestre(sltTrimestre)" required>
                                                <option selected disabled value="">ELIJA EL TRIMESTRE</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                    @endswitch

                                </div>
                                <div class="form-group col-4">
                                    <label for="sltAnio" class="form-label">AÑO</label>
                                    <select name="sltAnio" id="sltAnio" class="form-select"
                                        onChange="convertirFechaPorAnio(sltAnio, txtFechaInicial,txtFechaFinal)" required>
                                        @php
                                            $anio = date('Y');
                                            $anios = null;
                                            echo '<option selected disabled value="">ELIJA EL AÑO</option>';
                                            for ($i = 2017; $i <= $anio; $i++) {
                                                if ($anioRequest == $i) {
                                                    echo '<option selected value=' . $i . '>' . $i . '</option>';
                                                    # code...
                                                } else {
                                                    echo '<option  value=' . $i . '>' . $i . '</option>';
                                                }
                                            }

                                        @endphp
                                    </select>
                                </div>

                                <div class="form-group col-13 text-left">
                                    <label for="sltIndicador" class="form-label">INDICADOR</label>
                                    <select name="sltIndicador" id="sltIndicador" class="form-select" required>
                                        @if ($indicadorRequest === null)
                                            <option selected disabled value="">ELIJA EL INDICADOR</option>
                                            @foreach ($indicadores as $indicador)
                                                <option value="{{ $indicador->idIndicador }}">
                                                    {{ $indicador->descripcion }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option>ELIJA EL INDICADOR</option>
                                            @foreach ($indicadores as $indicador)
                                                @if ($indicador->idIndicador == $indicadorRequest)
                                                    <option selected value="{{ $indicador->idIndicador }}">
                                                        {{ $indicador->descripcion }}
                                                    </option>
                                                @else
                                                    <option value="{{ $indicador->idIndicador }}">
                                                        {{ $indicador->descripcion }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <input hidden value="{{ $fechaInicio }}" type="text" name="txtFechaInicial" required
                                id="txtFechaInicial">
                            <input hidden value="{{ $fechaFinal }}" type="text" name="txtFechaFinal" id="txtFechaFinal"
                                required>
                            <div class="div-center">
                                <button id="btnCalcular" type="submit" class="btn btn-primary"><i
                                        class="bi bi-calculator"></i>
                                    CALCULAR</button>
                            </div>
                        </form>
                        <br>
                        <input hidden type="text" id="indicadorRequest" value="{{ $indicadorRequest }}">
                        <table hidden class="table table-hover col-5 table-center" id="tablaIndicador">
                            <thead>
                                <tr>
                                    <th scope="col">CANTIDAD</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($indicadoresCount == '')
                                    <tr>
                                        <td colspan="1">NO HAY CONVENIOS</td>
                                    <tr>
                                    @else
                                    <tr>
                                        <th scope="row">{{ $indicadoresCount }}</th>
                                    </tr>
                                @endif
                                {{-- @if ($indicadoresCount == null)
                                    <tr>
                                        <td colspan="1">NO HAY CONVENIOS</td>
                                    <tr>
                                    @else
                                    <tr>
                                        <th scope="row">{{ $indicadoresCount }}</th>
                                    </tr>
                                @endif --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            /* -------------------------------------------------------------------------- */
            /*                    Validar tabla en reporte indicadores                    */
            /* -------------------------------------------------------------------------- */
            window.onload = function() {
                validarTablaIndicador();
            };

            function validarTablaIndicador() {
                let indicador = document.getElementById("indicadorRequest").value;
                let tablaIndicador = document.getElementById("tablaIndicador");
                if (indicador != "") {
                    tablaIndicador.removeAttribute("hidden");
                }
            }
        </script>
    @endsection
