@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('REPORTE CONVENIOS VIGENTES POR FECHA') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3 class="text-center">REPORTE CONVENIOS VIGENTES POR FECHA</h3>
                        <form action="{{ route('consulta-convenio-por-fecha') }}" method="GET" class="needs-validation"
                            novalidate>
                            <div class="div-flex">
                                <div class="form-group col-4">
                                    <label for="dateFecha" class="form-label text-center">FECHA</label>
                                    <input type="date" class="form-control" value="{{ $fecha }}" name="dateFecha"
                                        id="dateFecha" required>
                                </div>
                            </div>
                            <div class="div-center">
                                <button id="btnCalcular" type="submit" class="btn btn-primary"><i
                                        class="bi bi-calculator"></i>
                                    CALCULAR</button>
                            </div>
                        </form>
                        <br>
                        @if (count($convenios) > 0)
                            <p class="text-center">TOTAL DE CONVENIOS: {{ count($convenios) }}</p>
                            <table class="table" id="tabla">
                                <thead>
                                    <tr>
                                        <th scope="col">FOLIO</th>
                                        <th scope="col">INSTANCIA</th>
                                        <th scope="col">FECHA DE FIRMA</th>
                                        <th scope="col">FECHA DE VIGENCIA</th>
                                        <th scope="col">ESTATUS ACTUAL</th>
                                        <th scope="col">TIPO DE CONVENIO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($convenios as $convenio)
                                        <tr>
                                            <td> {{ $convenio->folio }} </td>
                                            @foreach ($instancias as $instancia)
                                                @if ($instancia->idInstancia === $convenio->idInstancia)
                                                    <td><a href="{{ $convenio->urlConvenio }}" class="link-primary"
                                                            target="_blank">{{ $instancia->nombre }}</a></td>
                                                @endif
                                            @endforeach
                                            <td> {{ $convenio->fechaFirma }} </td>
                                            @if ($convenio->vigenciaIndefinida == 'SI')
                                                <td> INDEFINIDO </td>
                                            @else
                                                <td> {{ $convenio->fechaVigencia }} </td>
                                            @endif
                                            <td> {{ $convenio->estatus }} </td>
                                            @foreach ($tipoConvenios as $tipoConvenio)
                                                @if ($tipoConvenio->idTipoConvenio === $convenio->idTipoCon)
                                                    <td> {{ $tipoConvenio->nomTipoConvenio }} </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-center" id="p-convenio">NINGÚN CONVENIO COINCIDE</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection
