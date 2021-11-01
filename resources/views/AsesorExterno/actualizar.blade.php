@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('asesorE.update', $asesoresE->idAsesorE) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label for="txtNombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                    value="{{ $asesoresI->nombre }}">
            </div>
            <div class="mb-3">
                <label for="txtEmail" class="form-label">Email</label>
                <input type="text" class="form-control" name="txtEmail" id="txtEmail"
                    value="{{ $asesoresI->email }}">
            </div>
            <div class="mb-3">
                <label for="txtTelefono" class="form-label">Telefono/label>
                <input type="text" class="form-control" name="txtTelefono" id="txtTelefono"
                    value="{{ $asesoresI->telefono }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
