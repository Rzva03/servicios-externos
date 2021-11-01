@extends('layouts.app')

@section('content')
    <div class="container">
        <button onclick="location.href='{{ route('tipocon.create') }}'" class="btn btn-primary">Nuevo</button>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo Convenio</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipos as $tipocon)
                    <tr>
                        <th scope="row">{{ $tipocon->idTipoCon }}</th>
                        <td> {{ $tipocon->nomTipoconvenio }} </td>
                        <td>
                            <button onclick="location.href='{{ route('tipocon.edit', $tipocon->idTipoConvenio) }}'"
                                class="btn btn-outline-primary">Modificar</button>
                        </td>
                        <td>
                            <form action="{{ route('tipocon.destroy', $tipocon->idTipoConvenio) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
