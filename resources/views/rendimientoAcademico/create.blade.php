@extends('estructura/layout')
@section('cuerpo')
    @include('estructura/header')

    <div class="container-fluid mb-5 p-1 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                <div class="card card-form">
                    <div class="row tittle border-bottom p-2">
                        <h2 class="col text-center fw-bold">Cargar rendimiento academico</h2>
                    </div>
                    <form action="{{ route('convertirExcel') }}" method="POST" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-sm-6 flex-column d-flex py-3">
                                <label class="form-label py-2">Se cargará el rendimiento académico para la
                                    solicitud:{{ $idSolicitud }}</label>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col col-sm-6 flex-column d-flex py-3">
                                <label class="form-label py-2" name="excel">Seleccione Archivo</label>
                                <input class="border-0 cell" type="file" id="excel" name="excel"
                                    value="{{ old('excel') }}">
                            </div>
                        </div>
                        <div class="row justify-content-center text-center py-4">
                            <input type="hidden" id="idSolicitud" name="idSolicitud" value="{{ $idSolicitud }}">
                            <div class="form-group col col-sm-6">
                                <button id="boton" name="boton" type="submit" class="botonFormulario">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
