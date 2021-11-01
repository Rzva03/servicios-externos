@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('asesorinterno.store') }}">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="txtNombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="txtNombre" id="txtNombre" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="txtEmail" class="form-label">Email</label>
                <input type="text" class="form-control" name="txtEmail" id="txtEmail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="txtTelefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" name="txtTelefono" id="txtTelefono" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
