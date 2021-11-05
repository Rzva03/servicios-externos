@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('INSTANCIA') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <button onclick="location.href='{{ route('instancia.create') }}'"
                            class="btn btn-primary">Nuevo</button>
                        <br><br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Responsable</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Giro</th>
                                    <th scope="col">Sector</th>
                                    <th scope="col">Tipo sector</th>
                                    <th scope="col">Tamaño</th>
                                    <th scope="col">Alcance</th>
                                    <th scope="col">Área conocimiento</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($instancias as $instancia)
                                    <tr>
                                        <th scope="row">{{ $instancia->idInstancia }}</th>
                                        <td> {{ $instancia->nombre }} </td>
                                        <td> {{ $instancia->responsable }} </td>
                                        <td> {{ $instancia->email }} </td>
                                        <td> {{ $instancia->telefono }} </td>
                                        <td> {{ $instancia->idGiro }} </td>
                                        <td> {{ $instancia->idSector }} </td>
                                        <td> {{ $instancia->idTipoSec }} </td>
                                        <td> {{ $instancia->idTamanio }} </td>
                                        <td> {{ $instancia->idAlcance }} </td>
                                        <td> {{ $instancia->idAreaC }} </td>
                                        <td>
                                            <button
                                                onclick="location.href='{{ route('instancia.edit', $instancias->idInstancia) }}'"
                                                class="btn btn-outline-primary">Modificar</button>
                                        </td>
                                        <td>
                                            <form action="{{ route('instancia.destroy', $instancias->idInstancia) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return confirm( '¿Esta seguro de borrar {{ $instancias->nombre }}?') ">Eliminar</button>
                                            </form>
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
