@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('AGREGAR PERIODO') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('periodo.store') }}">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="txtNombre" class="form-label">PERIODO</label>
                                <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                                    onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="bi bi-plus-square-dotted"></i>
                                AGREGAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
