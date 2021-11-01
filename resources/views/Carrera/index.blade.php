@extends('layouts.app')

@section('content')
    <div class="container">
        <button onclick="location.href='{{ route('carrera.create') }}'" class="btn btn-primary">Nuevo</button>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carreras as $carrera)
                    <tr>
                        <th scope="row">{{ $carrera->idCarrera }}</th>
                        <td> {{ $carrera->carrera }} </td>
                        <td>
                            <button onclick="location.href='{{ route('carrera.edit', $carrera->idCarrera) }}'"
                                class="btn btn-outline-primary">Modificar</button>
                        </td>
                        <td>
                            <form action="{{ route('carrera.destroy', $carrera->idCarrera) }}" method="POST">
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
