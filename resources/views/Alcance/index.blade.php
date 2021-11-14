@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('LISATADO DE LOS ALCANCES') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <button onclick="location.href='{{ route('alcance.create') }}'"
                            class="btn btn-primary">NUEVO</button>
                        <br><br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">ALCANCE</th>
                                    <th scope="col">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alcances as $alcance)
                                    <tr>
                                        <th scope="row">{{ $alcance->idAlcance }}</th>
                                        <td> {{ $alcance->nombre }} </td>
                                        <td>
                                            <div style="display: flex; justify-content: start;">
                                                <button style="margin-right: 1rem"
                                                    onclick="location.href='{{ route('alcance.edit', $alcance->idAlcance) }}'"
                                                    class="btn btn-outline-primary">MODIFICAR</button>
                                                <form action="{{ route('alcance.destroy', $alcance->idAlcance) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm( '¿Esta seguro de borrar {{ $alcance->nombre }}?') ">ELIMINAR</button>
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
