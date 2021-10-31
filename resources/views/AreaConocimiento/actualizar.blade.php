@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('area-conocimiento.update', $areaConocimientos->idAreaC) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label for="txtNombre" class="form-label">Área Conocimiento</label>
                <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                    value="{{ $areaConocimientos->nomAreaC }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection