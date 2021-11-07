@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('AGREGAR INSTANCIA') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('instancia.store') }}">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="txtResponsable" class="form-label">NOMBRE:</label>
                                <input type="text" class="form-control" name="txtNombre" id="txtNombre" required
                                    onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </div>
                            <div class="mb-3">
                                <label for="txtResponsable" class="form-label">RESPONSABLE</label>
                                <input type="text" class="form-control" name="txtResponsable" id="txtResponsable" required
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
                            <div class="mb-3">
                                <select name="sltGiro" class="form-select form-select-lg mb-3"
                                    aria-label=".form-select-lg example" required>
                                    <option selected>ELIJA EL GIRO</option>
                                    @foreach ($giros as $giro)
                                        <option value="{{ $giro->idGiro }}">{{ $giro->nomGiro }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <select name="sltSector" class="form-select form-select-lg mb-3"
                                    aria-label=".form-select-lg example" required>
                                    <option selected>ELIJA EL SECTOR</option>
                                    @foreach ($sectores as $sector)
                                        <option value="{{ $sector->idSector }}">{{ $sector->nomSector }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <select name="sltTipoSector" class="form-select form-select-lg mb-3"
                                    aria-label=".form-select-lg example" required>
                                    <option selected>ELIJA EL TIPO DE SECTOR</option>
                                    @foreach ($tipoSectores as $tipoSector)
                                        <option value="{{ $tipoSector->idTipoSec }}">{{ $tipoSector->nomTipoSec }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <select name="sltTamanio" class="form-select form-select-lg mb-3"
                                    aria-label=".form-select-lg example" required>
                                    <option selected>ELIJA EL TAMAÑO</option>
                                    @foreach ($tamanios as $tamanio)
                                        <option value="{{ $tamanio->idTamanio }}">{{ $tamanio->nomTamanio }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <select name="sltAreaConocimiento" class=" form-select form-select-lg mb-3"
                                    aria-label=".form-select-lg example" required>
                                    <option selected>ELIJA EL ÁREA DE CONOCIMIENTO</option>
                                    @foreach ($areaConocimientos as $areaConocimiento)
                                        <option value="{{ $areaConocimiento->idAreaC }}">
                                            {{ $areaConocimiento->nomAreaC }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">AGREGAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
