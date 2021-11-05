@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('sector.update', $sectores->idSector) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label for="txtNombre" class="form-label">Sector</label>
                <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                    value="{{ $sectores->nomSector }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection


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
                        <form action="{{ route('sector.update', $sectores->idSector) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="mb-3">
                                <label for="txtNombre" class="form-label">Sector</label>
                                <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                                    value="{{ $sectores->nomSector }}"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
