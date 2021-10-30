@extends('layouts.app')

@section('content')
    <div class="container">
        <button onclick="location.href='{{ route('tipo-sector.create') }}'" class="btn btn-primary">Nuevo</button>
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
                @foreach ($tipoSectores as $tipoSector)
                    <tr>
                        <th scope="row">{{ $tipoSector->idTipoSec }}</th>
                        <td> {{ $tipoSector->nomTipoSec }} </td>
                        <td>
                            <button onclick="location.href='{{ route('tipo-sector.edit', $tipoSector->idTipoSec) }}'"
                                class="btn btn-outline-primary">Modificar</button>
                        </td>
                        <td>
                            <form action="{{ route('tipo-sector.destroy', $tipoSector->idTipoSec) }}" method="POST">
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
