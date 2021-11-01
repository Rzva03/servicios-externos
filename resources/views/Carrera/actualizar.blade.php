@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('carrera.update', $carreras->idCarrera) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label for="txtNombre" class="form-label">Carrera</label>
                <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                    value="{{ $carreras->carrera }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
