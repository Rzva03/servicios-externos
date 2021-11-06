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
                            class="btn btn-primary">NUEVO</button>
                        <br><br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">RESPONSABLE</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">TELÉFONO</th>
                                    <th scope="col">GIRO</th>
                                    <th scope="col">SECTOR</th>
                                    <th scope="col">TIPO SECTOR</th>
                                    <th scope="col">TAMAÑO</th>
                                    <th scope="col">ALCANCE</th>
                                    <th scope="col">ÁREA DE CONOCIMIENTO</th>
                                    <th scope="col">ACCIONES</th>
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
                                                class="btn btn-outline-primary">MODIFICAR</button>
                                        </td>
                                        <td>
                                            <form action="{{ route('instancia.destroy', $instancias->idInstancia) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return confirm( '¿Esta seguro de borrar {{ $instancias->nombre }}?') ">ELIMINAR</button>
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
