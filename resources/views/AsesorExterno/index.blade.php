@extends('layouts.app')

@section('content')
    <div class="container">
        <button onclick="location.href='{{ route('asesor-externo.create') }}'" class="btn btn-primary">Nuevo</button>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Acciones</th>
                    {{-- <th scope="col">Eliminar</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($asesoresExternos as $asesorExterno)
                    <tr>
                        <th scope="row">{{ $asesorExterno->idAsesorE }}</th>
                        <td> {{ $asesorExterno->nombre }} </td>
                        <td> {{ $asesorExterno->email }} </td>
                        <td> {{ $asesorExterno->telefono }} </td>
                        <td>
                            <button
                                onclick="location.href='{{ route('asesor-externo.edit', $asesorExterno->idAsesorE) }}'"
                                class="btn btn-outline-primary">Modificar</button>
                            {{-- </td> --}}
                            {{-- <td> --}}
                            <br><br>
                            <form action="{{ route('asesor-externo.destroy', $asesorExterno->idAsesorE) }}" method="POST">
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
