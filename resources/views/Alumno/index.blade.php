@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('ALUMNOS') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <button onclick="location.href='{{ route('alumno.create') }}'"
                            class="btn btn-primary">NUEVO</button>
                        <br><br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">TELÉFONO</th>
                                    <th scope="col">CARRERA</th>
                                    <th scope="col">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alumnos as $alumno)
                                    <tr>
                                        <th scope="row">{{ $alumno->idAlumno }}</th>
                                        <td> {{ $alumno->nombre }} </td>
                                        <td> {{ $alumno->email }} </td>
                                        <td> {{ $alumno->telefono }} </td>
                                        @foreach ($carreras as $carrera)
                                            @if ($carrera->idCarrera === $alumno->idCarrera)
                                                <td> {{ $carrera->nomCarrera }} </td>
                                            @endif
                                        @endforeach
                                        <td>
                                            <div style="display: flex; justify-content: start;">
                                                <button style="margin-right: 1rem"
                                                    onclick="location.href='{{ route('alumno.edit', $alumno->idAlumno) }}'"
                                                    class="btn btn-outline-primary">MODIFICAR</button>
                                                <form action="{{ route('alumno.destroy', $alumno->idAlumno) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm( '¿Esta seguro de borrar {{ $alumno->nombre }}?') ">ELIMINAR</button>
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
