@extends('layouts.app')

@section('content')
    <div class="container">
        <button onclick="location.href='{{ route('periodo.create') }}'" class="btn btn-primary">Nuevo</button>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Periodo</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($periodos as $periodo)
                    <tr>
                        <th scope="row">{{ $periodo->idPeriodo }}</th>
                        <td> {{ $periodo->periodo }} </td>
                        <td>
                            <button onclick="location.href='{{ route('periodo.edit', $periodo->idPeirodo) }}'"
                                class="btn btn-outline-primary">Modificar</button>
                        </td>
                        <td>
                            <form action="{{ route('periodo.destroy', $periodo->idPeriodo) }}" method="POST">
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
