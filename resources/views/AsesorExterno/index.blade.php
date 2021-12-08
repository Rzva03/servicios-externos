@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('LISTADO DE ASESORES EXTERNOS') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="div-flex">
                            <button onclick="location.href='{{ route('asesor-externo.create') }}'"
                                class="btn btn-primary ">
                                <i class="bi bi-plus-square-dotted"></i> NUEVO</button>
                            <div class="input-group col-5">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                <input id="busqueda" type="text" class="form-control" placeholder="BÚSQUEDA"
                                    style="text-transform: uppercase;" onkeyup='busquedaTabla()'>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">TELÉFONO</th>
                                    <th scope="col">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asesoresExternos as $asesorExterno)
                                    <tr>
                                        <td> {{ $asesorExterno->nombre }} </td>
                                        <td> {{ $asesorExterno->email }} </td>
                                        <td> {{ $asesorExterno->telefono }} </td>
                                        <td>
                                            <div style="display: flex; justify-content: start;">
                                                <button style="margin-right: 1rem;"
                                                    onclick="location.href='{{ route('asesor-externo.edit', $asesorExterno->idAsesorE) }}'"
                                                    class="btn btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                                <form
                                                    action="{{ route('asesor-externo.destroy', $asesorExterno->idAsesorE) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm( '¿ESTA SEGURO DE ELIMINAR {{ $asesorExterno->nombre }}?') ">
                                                        <i class="bi bi-eraser"></i></button>
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
