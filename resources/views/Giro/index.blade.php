@extends('layouts.app')

@section('content')
    <div class="container">
        <button onclick="location.href='{{ route('giro.create') }}'" class="btn btn-primary">Nuevo</button>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Giro</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($giros as $giro)
                    <tr>
                        <th scope="row">{{ $giro->idGiro }}</th>
                        <td> {{ $giro->nomGiro }} </td>
                        <td>
                            <button onclick="location.href='{{ route('giro.edit', $giro->idGiro) }}'"
                                class="btn btn-outline-primary">Modificar</button>
                        </td>
                        <td>
                            <form action="{{ route('giro.destroy', $giro->idGiro) }}" method="POST">
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
