@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('INSTANCIA') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('instancia.store') }}">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="txtResponsable" class="form-label">Responsable</label>
                                <input type="text" class="form-control" name="txtResponsable" id="txtResponsable" required
                                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                                <label for="txtEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" name="txtEmail" id="txtEmail" required
                                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                                <label for="txtTelefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" name="txtTelefono" id="txtTelefono" required
                                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                                <br>
                                <select name="sltSector" class="form-select form-select-lg mb-3"
                                    aria-label=".form-select-lg example" required>
                                    <option selected>Eliga el sector</option>
                                    @foreach ($sectores as $sector)
                                        <option value="{{ $sector->idSector }}">{{ $sector->nomSector }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <select name="sltTipoSector" class="form-select form-select-lg mb-3"
                                    aria-label=".form-select-lg example" required>
                                    <option selected>Eliga el Tipo de sector</option>
                                    @foreach ($tipoSectores as $tipoSector)
                                        <option value="{{ $tipoSector->idTipoSec }}">{{ $tipoSector->nomTipoSec }}
                                        </option>
                                    @endforeach
                                </select>
                                <br>
                                <select name="sltAreaConocimiento class="     form-select form-select-lg mb-3"
                                    aria-label=".form-select-lg example" required>
                                    <option selected>Eliga el área de conocimiento</option>
                                    @foreach ($areaConocimientos as $areaConocimiento)
                                        <option value="{{ $areaConocimiento->idAreaC }}">
                                            {{ $areaConocimiento->nomAreaC }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
