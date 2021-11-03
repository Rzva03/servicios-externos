@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('PANEL DE CONTROL') }}</div>

                    <div class="card-body"
                        style="height: 60vh; background-image: url(https://plataforma.voaxaca.tecnm.mx/pluginfile.php/1/theme_moove/sliderimage1/1629958313/banner_itvo.jpg); background-size: cover"
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        {{ __('BIENVENIDO!') }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
