@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('ASESOR EXTERNO') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <button onclick="location.href='{{ route('asesor-externo.create') }}'"
                            class="btn btn-primary">Nuevo</button>
                        <br><br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Acciones</th>
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
                                            <div style="display: flex; justify-content: space-evenly;">
                                                <button style="margin-right: 1rem"
                                                    onclick="location.href='{{ route('asesor-externo.edit', $asesorExterno->idAsesorE) }}'"
                                                    class="btn btn-outline-primary">Modificar</button>
                                                <br><br>
                                                <form
                                                    action="{{ route('asesor-externo.destroy', $asesorExterno->idAsesorE) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
