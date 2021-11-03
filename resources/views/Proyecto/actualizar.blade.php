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
                        <form action="{{ route('proyecto.update', $proyectos->idProyecto) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="mb-3">
                                <label for="txtNombre" class="form-label">Nombre del proyecto</label>
                                <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                                    value="{{ $proyectos->proyecto }}">
                            </div>
                            <div class="mb-3">
                                <label for="txtPeriodo" class="form-label">Modalidad</label>
                                <input type="text" class="form-control" name="txtModalidad" id="txtModalidad"
                                    value="{{ $proyectos->proyecto }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
