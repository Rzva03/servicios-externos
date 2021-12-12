@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-primary">
                        <h2>{{ __('PLATAFORMA DE LA OFICINA SERVICIOS EXTERNOS') }}</h2>
                    </div>

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
    <script>
        window.onload = function() {
            mostrarNotificacion();
        };

        function mostrarNotificacion() {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '¡ESTATUS ACTUALIZADO CON ÉXITO!',
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>
@endsection
