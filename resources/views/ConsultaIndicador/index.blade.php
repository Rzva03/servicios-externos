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
                        <form action="{{ route('consulta-indicador.index') }}" method="GET">
                            <div class="div-flex">
                                <div class="form-group col-4">
                                    <label for="sltTrimestre" class="form-label">TRIMESTRE</label>
                                    @switch($trimestreRequest)
                                        @case(" 1")
                                            <select name="sltTrimestre" id="sltTrimestre" class="form-control"
                                                onChange="convertirFechaPorTrimestre(sltTrimestre)" required>
                                                <option>ELIJA EL TRIMESTRE</option>
                                                <option selected value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        @break
                                        @case(" 2")
                                            <select name="sltTrimestre" id="sltTrimestre" class="form-control"
                                                onChange="convertirFechaPorTrimestre(sltTrimestre)" required>
                                                <option>ELIJA EL TRIMESTRE</option>
                                                <option value="1">1</option>
                                                <option selected value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        @break
                                        @case(" 3")
                                            <select name="sltTrimestre" id="sltTrimestre" class="form-control"
                                                onChange="convertirFechaPorTrimestre(sltTrimestre)" required>
                                                <option>ELIJA EL TRIMESTRE</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option selected value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        @break
                                        @case(" 4")
                                            <select name="sltTrimestre" id="sltTrimestre" class="form-control"
                                                onChange="convertirFechaPorTrimestre(sltTrimestre)" required>
                                                <option>ELIJA EL TRIMESTRE</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option selected value="4">4</option>
                                            </select>
                                        @break
                                        @default
                                            <select name="sltTrimestre" id="sltTrimestre" class="form-control"
                                                onChange="convertirFechaPorTrimestre(sltTrimestre)" required>
                                                <option selected>ELIJA EL TRIMESTRE</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                    @endswitch

                                </div>
                                <div class="form-group col-4">
                                    <label for="sltAnio" class="form-label">AÑO</label>
                                    <select name="sltAnio" id="sltAnio" class="form-control"
                                        onChange="convertirFechaPorAnio(sltAnio, txtFechaInicial,txtFechaFinal)" required>
                                        @php
                                            $anio = date('Y');
                                            $anios = null;
                                            echo '<option selected>ELIJA EL AÑO</option>';
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
                                {{-- <p>{{ $indicadorRequest }}</p> --}}
                                <div class="form-group col-13 text-left">
                                    <label for="sltIndicador" class="form-label">INDICADOR</label>
                                    <select name="sltIndicador" id="sltIndicador" class="form-control" required>
                                        @if ($indicadorRequest === null)
                                            <option selected>ELIJA EL INDICADOR</option>
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
                            <input value="{{ $fechaInicio }}" type="text" name="txtFechaInicial" id="txtFechaInicial">
                            <input value="{{ $fechaFinal }}" type="text" name="txtFechaFinal" id="txtFechaFinal">
                            <div class="div-center">
                                <button type="submit" class="btn btn-primary">CALCULAR</button>
                            </div>
                        </form>
                        <br>
                        <table class="table table-hover col-8 table-center">
                            <thead>
                                <tr>
                                    <th scope="col">CANTIDAD</th>
                                    <th scope="col">DESCRIPCIÓN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($indicadoresCount == 0)
                                    <tr>
                                        <td colspan="2">NO HAY RESULTADOS</td>
                                    </tr>
                                @else
                                    <tr>
                                        <th scope="row">{{ $indicadoresCount }}</th>
                                        <td>AHAHAHA</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
