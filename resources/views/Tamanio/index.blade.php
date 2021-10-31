@extends('layouts.app')

@section('content')
    <div class="container">
        <button onclick="location.href='{{ route('tamanio.create') }}'" class="btn btn-primary">Nuevo</button>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tamaño</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tamanios as $tamanio)
                    <tr>
                        <th scope="row">{{ $tamanio->idTamanio }}</th>
                        <td> {{ $tamanio->nomTamanio }} </td>
                        <td>
                            <button onclick="location.href='{{ route('tamanio.edit', $tamanio->idTamanio) }}'"
                                class="btn btn-outline-primary">Modificar</button>
                        </td>
                        <td>
                            <form action="{{ route('tamanio.destroy', $tamanio->idTamanio) }}" method="POST">
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
