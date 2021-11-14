@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11 col-xs-11">
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
                        <table class="table col-md-10">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">RESPONSABLE</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">TELÉFONO</th>
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
                                        <td>
                                            <div style="display: flex; justify-content: start;">
                                                <button style="margin-right: 1rem"
                                                    onclick="location.href='{{ route('instancia.show', $instancia->idInstancia) }}'"
                                                    class="btn btn-outline-secondary">DETALLE</button>
                                                <button style="margin-right: 1rem"
                                                    onclick="location.href='{{ route('instancia.edit', $instancia->idInstancia) }}'"
                                                    class="btn btn-outline-primary">MODIFICAR</button>
                                                <form action="{{ route('instancia.destroy', $instancia->idInstancia) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm( '¿Esta seguro de borrar {{ $instancia->nombre }}?') ">ELIMINAR</button>
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
