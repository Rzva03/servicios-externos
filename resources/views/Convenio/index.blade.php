@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('CONVENIOS') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <button onclick="location.href='{{ route('convenio.create') }}'"
                            class="btn btn-primary">NUEVO</button>
                        <br><br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
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
                                        <th scope="row">{{ $convenio->idConvenio }}</th>
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
                                                    class="btn btn-outline-primary">MODIFICAR</button>
                                                <form action="{{ route('convenio.destroy', $convenio->idConvenio) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm( '¿Esta seguro de borrar {{ $convenio->folio }}?') ">ELIMINAR</button>
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
