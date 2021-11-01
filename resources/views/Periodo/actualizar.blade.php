@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('periodo.update', $periodos->idPeriodo) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label for="txtNombre" class="form-label">Periodo</label>
                <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                    value="{{ $periodos->periodo }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
