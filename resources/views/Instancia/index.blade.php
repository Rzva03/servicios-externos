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
                                    <th scope="col">Responsable</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Giro</th>
                                    <th scope="col">Sector</th>
                                    <th scope="col">Tipo sector</th>
                                    <th scope="col">Alcance</th>
                                    <th scope="col">Área conocimiento</th>
                                    <th scope="col">Modificar</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($instancias as $instancias)
                                    <tr>
                                        <th scope="row">{{ $instinstancia->idSector }}</th>
                                        <td> {{ $instancias->nomSector }} </td>
                                        <td> {{ $instancias->nomSector }} </td>
                                        <td> {{ $instancias->nomSector }} </td>
                                        <td> {{ $instancias->nomSector }} </td>
                                        <td> {{ $instancias->nomSector }} </td>
                                        <td> {{ $instancias->nomSector }} </td>
                                        <td> {{ $instancias->nomSector }} </td>
                                        <td> {{ $instancias->nomSector }} </td>
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
                                                <button type="submit" class="btn btn-outline-danger">Eliminar</button>
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
