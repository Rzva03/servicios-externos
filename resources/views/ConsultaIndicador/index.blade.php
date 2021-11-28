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
                        <form action="{{ route('consulta-indicador.index') }}" method="get">
                            <div class="div-flex">
                                <div class="form-group col-4">
                                    <label for="sltTrimestre" class="form-label">TRIMESTRE</label>
                                    <select name="sltTrimestre" id="sltTrimestre" class="form-control"
                                        onChange="convertirFechaPorTrimestre(sltTrimestre)" required>
                                        <option selected>ELIJA EL TRIMESTRE</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="sltAnio" class="form-label">AÑO</label>
                                    <select name="sltAnio" id="sltAnio" class="form-control" onChange="convertirFechaPorAnio(sltAnio, txtFechaInicial,
                                                                             txtFechaFinal)" required>
                                        <option selected>ELIJA EL AÑO</option>
                                        @php
                                            $anio = date('Y');
                                            $anios = null;
                                            for ($i = 2017; $i <= $anio; $i++) {
                                                echo '<option value=' . $i . '>' . $i . '</option>';
                                            }
                                        @endphp
                                    </select>
                                </div>
                                <div class="form-group col-13 text-left">
                                    <label for="sltIndicador" class="form-label">INDICADOR</label>
                                    <select name="sltIndicador" id="sltIndicador" class="form-control" required>
                                        <option selected>ELIJA EL INDICADOR</option>
                                        @foreach ($indicadores as $indicador)
                                            <option value="{{ $indicador->idIndicador }}">{{ $indicador->descripcion }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input hidden type="text" name="txtFechaInicial" id="txtFechaInicial">
                            <br>
                            <input hidden type="text" name="txtFechaFinal" id="txtFechaFinal">
                            <br>
                            <div class="div-center">
                                <button type="submit" class="btn btn-primary">CALCULAR</button>
                            </div>
                        </form>
                        @if ($indicadoresCount === 0)
                            <p>No hay datos</p>
                        @else
                            <p>{{ $indicadoresCount }}</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endsection
