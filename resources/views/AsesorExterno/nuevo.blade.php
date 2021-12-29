@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('AGREGAR ASESOR EXTERNO') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('asesor-externo.store') }}" class="needs-validation"
                            novalidate>
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="txtNombre" class="form-label">NOMBRE</label>
                                <input type="text" class="form-control" name="txtNombre" id="txtNombre" required
                                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </div>
                            <div class="mb-3">
                                <label for="txtEmail" class="form-label">EMAIL</label>
                                <input type="email" class="form-control" name="txtEmail" id="txtEmail" required
                                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </div>
                            <div class="mb-3">
                                <label for="txtTelefono" class="form-label">TELÉFONO</label>
                                <input type="tel" class="form-control" name="txtTelefono" id="txtTelefono" required
                                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </div>
                            <div class="row g-3">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-plus-square-dotted"></i>
                                    AGREGAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
