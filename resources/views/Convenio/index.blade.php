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
                                <div class="col-4">
                                    <select name="sltCarrera" id="sltCarrera" class="form-select" required>
                                        <option selected>ELIJA LA CARRERA</option>
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
                            {{-- <div class="div-flex"> --}}
                            <div class="input-group col-4">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                <input id="busqueda" type="text" class="form-control" placeholder="BÚSQUEDA"
                                    style="text-transform: uppercase;" onkeyup='busquedaTabla()'>
                            </div>
                            <button onclick="location.href='{{ route('convenio.create') }}'" class="btn btn-primary "><i
                                    class="bi bi-plus-square-dotted"></i> NUEVO</button>
                            {{-- </div> --}}
                        </div>
                        <table class="table" id="tabla">
                            <thead>
                                <tr>
                                    <th scope="col">FOLIO</th>
                                    <th scope="col">INSTANCIA</th>
                                    <th scope="col">FECHA DE FIRMA</th>
                                    <th scope="col">FECHA DE VIGENCIA</th>
                                    <th scope="col">ESTATUS</th>
                                    <th scope="col">TIPO DE CONVENIO</th>
                                    <th scope="col">ACCIONES</th>
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
                                        <td> {{ $convenio->fechaVigencia }} </td>
                                        <td> {{ $convenio->estatus }} </td>
                                        @foreach ($tipoConvenios as $tipoConvenio)
                                            @if ($tipoConvenio->idTipoConvenio === $convenio->idTipoCon)
                                                <td> {{ $tipoConvenio->nomTipoConvenio }} </td>
                                            @endif
                                        @endforeach
                                        <td>
                                            <div style="display: flex; justify-content: start;">
                                                <button style="margin-right: 1rem"
                                                    onclick="location.href='{{ route('convenio.edit', $convenio->idConvenio) }}'"
                                                    class="btn btn-outline-primary"><i class="bi bi-pencil"></i>
                                                </button>
                                                <form action="{{ route('convenio.destroy', $convenio->idConvenio) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm( '¿ESTÁ SEGURO DE BORRAR {{ $convenio->folio }}?') "><i
                                                            class="bi bi-eraser"></i></button>
                                                </form>
                                            </div>

                                        </td>
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
