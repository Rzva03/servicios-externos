@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('LISTADO DE CONVENIOS') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="div-flex">
                            <form class="col-8 form-flex" action="{{ route('convenio.index') }}" method="GET">
                                <div class="col-5">
                                    <select name="sltCarrera" id="sltCarrera" class="form-select" required>
                                        <option selected>ELIJA LA CARRERA</option>
                                        <option value="0">
                                            TODAS LAS CARRERAS
                                        </option>
                                        @foreach ($carreras as $carrera)
                                            <option value="{{ $carrera->idCarrera }}">
                                                {{ $carrera->nomCarrera }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-secondary"><i class="bi bi-funnel"></i>
                                    FILTRAR</button>
                            </form>
                            <div class="input-group col-4 div-flex">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                <input id="busqueda" type="text" class="form-control" placeholder="BÚSQUEDA"
                                    style="text-transform: uppercase;" onkeyup='busquedaTabla()'>
                            </div>
                            <button onclick="location.href='{{ route('convenio.create') }}'"
                                class="btn btn-primary btn-margin"><i class="bi bi-plus-square-dotted"></i>
                                NUEVO</button>
                        </div>
                        @if (count($convenios) > 0)
                            @php
                                echo '<p class="text-center"> TOTAL DE CONVENIOS: ' . count($convenios) . '</p>';
                            @endphp
                            {{-- <p>count($convenios)</p> --}}
                        @endif
                        <table class="table" id="tabla">
                            <thead>
                                <tr>
                                    <th scope="col">FOLIO</th>
                                    <th scope="col">INSTANCIA</th>
                                    <th scope="col">FECHA DE FIRMA</th>
                                    <th scope="col">FECHA DE VIGENCIA</th>
                                    <th scope="col">ESTATUS</th>
                                    <th scope="col">TIPO DE CONVENIO</th>
                                    @if (Auth::user()->rol == 1)
                                        <th scope="col">ACCIONES</th>
                                    @endif
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
                                        @if (Auth::user()->rol == 1)
                                            <td>
                                                <div style="display: flex; justify-content: start;">
                                                    @if (Auth::user()->rol == 0)
                                                        <button hidden style="margin-right: 1rem"
                                                            onclick="location.href='{{ route('convenio.edit', $convenio->idConvenio) }}'"
                                                            class="btn btn-outline-primary"><i class="bi bi-pencil"
                                                                id="btnEditar"></i>
                                                        </button>
                                                        <form hidden
                                                            action="{{ route('convenio.destroy', $convenio->idConvenio) }}"
                                                            method="POST" id="form">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-outline-danger"
                                                                onclick="return confirm( '¿ESTÁ SEGURO DE BORRAR {{ $convenio->folio }}?') "><i
                                                                    class="bi bi-eraser"></i></button>
                                                        </form>
                                                        <script>
                                                            nodo = document.getElementById("form");
                                                            if (nodo.parentNode) {
                                                                nodo.parentNode.removeChild(nodo);
                                                            }
                                                            nodo2 = document.getElementById("btnEditar");
                                                            if (nodo2.parentNode) {
                                                                nodo2.parentNode.removeChild(nodo2);
                                                            }
                                                        </script>
                                                    @else
                                                        <button style="margin-right: 1rem"
                                                            onclick="location.href='{{ route('convenio.edit', $convenio->idConvenio) }}'"
                                                            class="btn btn-outline-primary"><i class="bi bi-pencil"></i>
                                                        </button>
                                                        <form
                                                            action="{{ route('convenio.destroy', $convenio->idConvenio) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-outline-danger"
                                                                onclick="return confirm( '¿ESTÁ SEGURO DE BORRAR {{ $convenio->folio }}?') "><i
                                                                    class="bi bi-eraser"></i></button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
