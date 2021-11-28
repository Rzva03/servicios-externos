@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('REPORTE INDICADOR') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3 class="text-center">CALCULAR INDICADORES POR TRIMESTRE</h3>
                        <div class="div-flex">
                            <div class="form-group col-4">
                                <label for="sltEstatus" class="form-label">TRIMESTRE</label>
                                <select name="sltEstatus" id="sltEstatus" class="form-control" required>
                                    <option selected>ELIJA EL TRIMESTRE</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label for="sltEstatus" class="form-label">AÑO</label>
                                <select name="sltEstatus" id="sltEstatus" class="form-control" required>
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
                            <div class="form-group col-8">
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
                    </div>
                </div>
            </div>
        </div>
    @endsection
