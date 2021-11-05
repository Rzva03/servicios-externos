@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('ASESOR INTERNO') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <button onclick="location.href='{{ route('asesor-interno.create') }}'"
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
                                @foreach ($asesoresInternos as $asesorInterno)
                                    <tr>
                                        <th scope="row">{{ $asesorInterno->idAsesorI }}</th>
                                        <td> {{ $asesorInterno->nombre }} </td>
                                        <td> {{ $asesorInterno->email }} </td>
                                        <td> {{ $asesorInterno->telefono }} </td>
                                        <td>
                                            <div style="display: flex; justify-content: start;">
                                                <button style="margin-right: 1rem"
                                                    onclick="location.href='{{ route('asesor-interno.edit', $asesorInterno->idAsesorI) }}'"
                                                    class="btn btn-outline-primary">Modificar</button>
                                                <form
                                                    action="{{ route('asesor-interno.destroy', $asesorInterno->idAsesorI) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm( '¿Esta seguro de borrar {{ $asesorInterno->nombre }}?') ">Eliminar</button>
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
