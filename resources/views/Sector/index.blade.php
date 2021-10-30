@extends('layouts.app')

@section('content')
    <div class="container">
        <button onclick="location.href='{{ route('sector.create') }}'" class="btn btn-warning">Nuevo</button>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Sector</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sectores as $sector)
                    <tr>
                        <th scope="row">{{ $sector->idSector }}</th>
                        <td> {{ $sector->nomSector }} </td>
                        <td>
                            <button onclick="location.href='{{ route('sector.edit', $sector->idSector) }}'"
                                class="btn btn-outline-primary">Modificar</button>
                        </td>
                        <td>
                            <form action="{{ route('sector.destroy', $sector->idSector) }}" method="POST">
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
