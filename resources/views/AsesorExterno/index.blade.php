@extends('layouts.app')

@section('content')
    <div class="container">
        <button onclick="location.href='{{ route('asesorexterno.create') }}'" class="btn btn-primary">Nuevo</button>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asesoresE as $asesorE)
                    <tr>
                        <th scope="row">{{ $asesorE->idAsesorE }}</th>
                        <td> {{ $asesorE->nombre }} </td>
                        <td>
                            <button onclick="location.href='{{ route('asesorE.edit', $asesorE->idAsesorE) }}'"
                                class="btn btn-outline-primary">Modificar</button>
                        </td>
                        <td>
                            <form action="{{ route('asesorE.destroy', $asesorE->idAsesorE) }}" method="POST">
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
