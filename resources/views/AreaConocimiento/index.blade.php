@extends('layouts.app')

@section('content')
    <div class="container">
        <button onclick="location.href='{{ route('area-conocimiento.create') }}'" class="btn btn-primary">Nuevo</button>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Área de conocimiento</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($areaConocimientos as $areaConocimiento)
                    <tr>
                        <th scope="row">{{ $areaConocimiento->idAreaC }}</th>
                        <td> {{ $areaConocimiento->nomAreaC }} </td>
                        <td>
                            <button
                                onclick="location.href='{{ route('area-conocimiento.edit', $areaConocimiento->idAreaC) }}'"
                                class="btn btn-outline-primary">Modificar</button>
                        </td>
                        <td>
                            <form action="{{ route('area-conocimiento.destroy', $areaConocimiento->idAreaC) }}"
                                method="POST">
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
