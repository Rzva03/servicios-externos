@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('VERIFIQUE SU DIRRECCIÓN DE CORREO ELECTRÓNICO') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('SE HA ENVIADO UNA NUEVA VERIFICACIÓN A SU DIRRECCIÓN DE CORREO ELECTRÓNICO.') }}
                        </div>
                    @endif

                    {{ __('ANTES DE CONTINUAR, PR FAVOR REVISE SU CORREO ELECTRÓNICO PARA EL ENLACE DE VERIFICACIÓN.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('CLIC AQUÍ PARA OTRO ENLACE') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
