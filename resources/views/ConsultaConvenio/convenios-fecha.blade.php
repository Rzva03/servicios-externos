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
                                <a tid="modal-btn" ype="button" href="#" class="btn btn-primary ml-5" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <i class="bi bi-calculator"></i>
                                    VER CANTIDAD
                                </a>
                            </div>
                        </form>
                        <br>
                        @if (count($convenios) > 0)
                            {{-- <script>
                                document.getElementById('modal').addEventListener('submit', (e) {
                                    e.preventDefault();

                                });
                            </script> --}}
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">CANTIDAD DE CONVENIOS POR
                                                INDICADORES</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table" id="tabla">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">CANTIDAD</th>
                                                        <th scope="col">INDICADOR SYSAD</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 0; $i < count($conteoIndicadores); $i++)
                                                        <tr>
                                                            <td>{{ $conteoIndicadores[$i] }}</td>
                                                            <td>{{ $indicadores[$i]->descripcion }}</td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                            <table class="table" id="tabla">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">CANTIDAD</th>
                                                        <th scope="col">OTRO INDICADOR</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 0; $i < count($conteoOtrosIndicadores); $i++)
                                                        <tr>
                                                            <td>{{ $conteoOtrosIndicadores[$i] }}</td>
                                                            <td>{{ $otrosIndicadores[$i]->descripcion }}</td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        <th scope="col">INDICADOR SYSAD</th>
                                        <th scope="col">OTRO INDICADOR</th>
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
                                            @foreach ($indicadores as $indicador)
                                                @if ($indicador->idIndicador === $convenio->idIndicador)
                                                    <td> {{ $indicador->descripcion }} </td>
                                                @endif
                                            @endforeach
                                            @foreach ($otrosIndicadores as $otroIndicador)
                                                @if ($otroIndicador->idOtroIndicador === $convenio->idOtroIndicador)
                                                    <td> {{ $otroIndicador->descripcion }} </td>
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
