@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('LISTADO DE TAMAÑOS') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="div-flex">
                            <button onclick="location.href='{{ route('tamanio.create') }}'"
                                class="btn btn-primary ">NUEVO</button>
                            <div class="input-group col-5">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                <input id="busqueda" type="text" class="form-control" placeholder="BÚSQUEDA"
                                    style="text-transform: uppercase;" onkeyup='busquedaTabla()'>
                            </div>
                        </div>
                        <table class="table" id="tabla">
                            <thead>
                                <tr>
                                    <th scope="col">TAMAÑO</th>
                                    <th scope="col">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tamanios as $tamanio)
                                    <tr>
                                        <td> {{ $tamanio->nomTamanio }} </td>
                                        <td>
                                            <div style="display: flex; justify-content: start;">
                                                <button style="margin-right: 1rem"
                                                    onclick="location.href='{{ route('tamanio.edit', $tamanio->idTamanio) }}'"
                                                    class="btn btn-outline-primary">MODIFICAR</button>
                                                <form action="{{ route('tamanio.destroy', $tamanio->idTamanio) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm( '¿ESTÁ SEGURO DE ELIMINAR {{ $tamanio->nomTamanio }}?') ">ELIMINAR</button>
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
