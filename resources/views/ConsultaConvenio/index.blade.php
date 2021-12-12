@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('LISTADO DE CONVENIOS VIGENTES') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3 class="text-center">ACUERDOS DE COLABORACÍON ACADÉMICA, CIENTÍFICA, TECNOLÓGICA AL
                            {{ $fecha }}</h3>
                        @if (count($convenios) > 0)
                            @php
                                echo '<p class="text-center"> TOTAL DE CONVENIOS: ' . count($convenios) . '</p>';
                            @endphp
                            {{-- <p>count($convenios)</p> --}}
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">INSTANCIA</th>
                                    <th scope="col">ESTATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($convenios as $convenio)
                                    <tr>
                                        @foreach ($instancias as $instancia)
                                            @if ($instancia->idInstancia === $convenio->idInstancia)
                                                <td><a href="{{ $convenio->urlConvenio }}" class="link-primary"
                                                        target="_blank">{{ $instancia->nombre }}</a></td>
                                            @endif
                                        @endforeach
                                        <td> {{ $convenio->estatus }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
