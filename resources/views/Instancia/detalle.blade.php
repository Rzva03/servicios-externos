@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12">
                <div class="card">
                    <div class="card-header">{{ __('DETALLE INSTANCIA') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        VER DATOS DE {{ $instancias->nombre }}
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="mb-3">
                                            <label for="txtResponsable" class="form-label">NOMBRE</label>
                                            <input type="text" class="form-control" name="txtNombre" id="txtNombre"
                                                value="{{ $instancias->nombre }}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="txtResponsable" class="form-label">RESPONSABLE</label>
                                            <input type="text" class="form-control" name="txtResponsable"
                                                id="txtResponsable" value="{{ $instancias->responsable }}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="txtEmail" class="form-label">EMAIL</label>
                                            <input type="email" class="form-control" name="txtEmail" id="txtEmail"
                                                value="{{ $instancias->email }}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="txtTelefono" class="form-label">TELÉFONO</label>
                                            <input type="tel" class="form-control" name="txtTelefono" id="txtTelefono"
                                                value="{{ $instancias->telefono }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="sltGiro" class="form-label">GIRO</label>
                                            <select name="sltGiro" class="form-select" disabled>
                                                <option>ELIJA EL GIRO</option>
                                                @foreach ($giros as $giro)
                                                    @if ($giro->idGiro === $instancias->idGiro)
                                                        <option selected value="{{ $giro->idGiro }}">
                                                            {{ $giro->nomGiro }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $giro->idGiro }}">{{ $giro->nomGiro }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sltSector" class="form-label">SECTOR</label>
                                            <select name="sltSector" class="form-select" disabled>
                                                <option>ELIJA EL SECTOR</option>
                                                @foreach ($sectores as $sector)
                                                    @if ($sector->idSector === $instancias->idSector)
                                                        <option selected value="{{ $sector->idSector }}">
                                                            {{ $sector->nomSector }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $sector->idSector }}">
                                                            {{ $sector->nomSector }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sltTipoSector" class="form-label">TIPO DE SECTOR</label>
                                            <select name="sltTipoSector" class="form-select" disabled>
                                                <option selected>ELIJA EL TIPO DE SECTOR</option>
                                                @foreach ($tipoSectores as $tipoSector)
                                                    @if ($tipoSector->idTipoSec === $instancias->idTipoSec)
                                                        <option selected value="{{ $tipoSector->idTipoSec }}">
                                                            {{ $tipoSector->nomTipoSec }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $tipoSector->idTipoSec }}">
                                                            {{ $tipoSector->nomTipoSec }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sltTamanio" class="form-label">TAMAÑO</label>
                                            <select name="sltTamanio" class="form-select" disabled>
                                                <option>ELIJA EL TAMAÑO</option>
                                                @foreach ($tamanios as $tamanio)
                                                    @if ($tamanio->idTamanio === $instancias->idTamanio)
                                                        <option selected value="{{ $tamanio->idTamanio }}">
                                                            {{ $tamanio->nomTamanio }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $tamanio->idTamanio }}">
                                                            {{ $tamanio->nomTamanio }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sltAreaConocimiento" class="form-label">ÁREA DE
                                                CONOCIMIENTO</label>
                                            <select name="sltAreaConocimiento" class=" form-select" disabled>
                                                <option selected>ELIJA EL ÁREA DE CONOCIMIENTO</option>
                                                @foreach ($areaConocimientos as $areaConocimiento)
                                                    @if ($areaConocimiento->idAreaC === $instancias->idAreaC)
                                                        <option selected value="{{ $areaConocimiento->idAreaC }}">
                                                            {{ $areaConocimiento->nomAreaC }}</option>
                                                    @else
                                                        <option value="{{ $areaConocimiento->idAreaC }}">
                                                            {{ $areaConocimiento->nomAreaC }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sltAlcance" class="form-label">ALCANCE</label>
                                            <select name="sltAlcance" class=" form-select" disabled>
                                                <option selected>ELIJA EL ALCANCE</option>
                                                @foreach ($alcances as $alcance)
                                                    @if ($alcance->idAlcance === $instancias->idAlcance)
                                                        <option selected value="{{ $alcance->idAlcance }}">
                                                            {{ $alcance->nombre }}</option>
                                                    @else
                                                        <option value="{{ $alcance->idAlcance }}">
                                                            {{ $alcance->nombre }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h2 class="text-center text-dark">CONVENIOS DE COLABORACIÓN</h2>
                        <br>
                        <table class="table" id="tabla">
                            <thead>
                                <tr>
                                    <th scope="col">FOLIO</th>
                                    {{-- <th scope="col">INSTANCIA</th> --}}
                                    <th scope="col">FECHA DE FIRMA</th>
                                    <th scope="col">FECHA DE VIGENCIA</th>
                                    <th scope="col">ESTATUS</th>
                                    <th scope="col">TIPO DE CONVENIO</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($convenios as $convenio)
                                    <tr>
                                        <td> {{ $convenio->folio }} </td>
                                        {{-- <td><a href="{{ $convenio->urlConvenio }}" class="link-primary"
                                                target="_blank">{{ $instancias->nombre }}</a></td> --}}
                                        <td> {{ $convenio->fechaFirma }} </td>
                                        <td> {{ $convenio->fechaVigencia }} </td>
                                        <td> {{ $convenio->estatus }} </td>
                                        @foreach ($tipoConvenios as $tipoConvenio)
                                            @if ($tipoConvenio->idTipoConvenio === $convenio->idTipoCon)
                                                <td> <a href="{{ $convenio->urlConvenio }}" class="link-primary"
                                                        target="_blank">{{ $tipoConvenio->nomTipoConvenio }}</a>
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <div class="mb-3">
                            <button onclick="location.href='{{ route('instancia.index') }}'" class="btn btn-primary"><i
                                    class="bi bi-arrow-left"></i> REGRESAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function() {
            if (!txtEmail.value) {
                txtEmail.value = "SIN EMAIL";
            }
            if (!txtTelefono.value) {
                txtTelefono.value = "SIN TELÉFONO";
            }
        })();
    </script>
@endsection
