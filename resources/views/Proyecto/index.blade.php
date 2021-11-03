@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('PROYECTO') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <button onclick="location.href='{{ route('proyecto.create') }}'"
                            class="btn btn-primary">Nuevo</button>
                        <br><br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre del proyecto</th>
                                    <th scope="col">Periodo</th>
                                    <th scope="col">Modalidad</th>
                                    <th scope="col">Alumno</th>
                                    <th scope="col">Periodo</th>
                                    <th scope="col">Asesor Interno</th>
                                    <th scope="col">Asesor Externo</th>
                                    <th scope="col">Instancia</th>
                                    <th scope="col">Modificar</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proyectos as $proyecto)
                                    <tr>
                                        <th scope="row">{{ $proyecto->idProyecto }}</th>
                                        <td> {{ $proyecto->proyecto }} </td>
                                        <td>
                                            <div style="display: flex; justify-content: start;">
                                                <button style="margin-right: 1rem"
                                                    onclick="location.href='{{ route('proyecto.edit', $proyecto->idProyecto) }}'"
                                                    class="btn btn-outline-primary">Modificar</button>
                                                <form
                                                    action="{{ route('proyecto.destroy', $proyecto->idProyecto) }}"
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
