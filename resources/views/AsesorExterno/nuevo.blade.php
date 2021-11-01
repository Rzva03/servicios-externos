@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('asesor-externo.store') }}">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="txtNombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="txtNombre" id="txtNombre" required>
            </div>
            <div class="mb-3">
                <label for="txtEmail" class="form-label">Email</label>
                <input type="email" class="form-control" name="txtEmail" id="txtEmail" required>
            </div>
            <div class="mb-3">
                <label for="txtTelefono" class="form-label">Telefono</label>
                <input type="tel" class="form-control" name="txtTelefono" id="txtTelefono" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
@endsection
