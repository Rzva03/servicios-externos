@extends('layouts.app')

@section('content')
    <div class="container">
        <button onclick="location.href='{{ route('asesorinterno.create') }}'" class="btn btn-primary">Nuevo</button>
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
                @foreach ($asesoresI as $asesorI)
                    <tr>
                        <th scope="row">{{ $asesorI->idAsesorI }}</th>
                        <td> {{ $asesorI->nombre }} </td>
                        <td>
                            <button onclick="location.href='{{ route('asesorI.edit', $asesorI->idAsesorI) }}'"
                                class="btn btn-outline-primary">Modificar</button>
                        </td>
                        <td>
                            <form action="{{ route('asesorI.destroy', $asesorI->idAsesorI) }}" method="POST">
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
