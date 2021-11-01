@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('giro.update', $giros->idGiro) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label for="txtNombre" class="form-label">Giro</label>
                <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                    value="{{ $giros->nomGiro }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
