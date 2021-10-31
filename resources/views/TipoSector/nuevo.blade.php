@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('tipo-sector.store') }}">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="txtNombre" class="form-label">Tipo de sector</label>
                <input type="text" class="form-control" name="txtNombre" id="txtNombre">
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
@endsection
