@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('tipo-sector.update', $tipoSectores->idTipoSec) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label for="txtNombre" class="form-label">Sector</label>
                <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                    value="{{ $tipoSectores->nomTipoSec }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
