@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Seleccionar Rendimiento académico - Petrel')@endphp
@include('estructura/header')

    <div class="container-fluid mb-5 p-1 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 col-lg-6  col-12 mt-4">
                <div class="card card-form">
                    <div class="row tittle border-bottom p-2 cell">
                        <h2 class="col text-center fw-bold">Cargar Rendimiento Académico</h2>
                    </div>
                    <form name=formExcel id=formExcel action="{{ route('convertirExcel') }}" method=POST autocomplete=off
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        @if ($errors->any()) {{-- Valida en servidor y regresa mostrando los siguientes errores --}}
                        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center m-3 p-3">
                            <i class='fas fa-times-circle mx-2'></i><h5>Revisa los siguientes datos e inténtalo nuevamente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-12 flex-column d-flex py-3">
                                <h4 class="col text-center fw-bold">Se cargará el rendimiento académico para la
                                     SOLICITUD: {{ $solicitud->id_solicitud }} </h4>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col col-12 flex-column d-flex py-3">
                                        <input type="file" class="form-control" id="excel" name="excel" value="{{ old('excel') }}">
                            </div>
                        </div>
                        <div class="row justify-content-center text-center py-4">
                            <input type="hidden" id="idSolicitud" name="idSolicitud" value="{{ $solicitud->id_solicitud }}">
                            <div class="form-group col col-sm-6">
                                <button id="boton" name="boton" type="submit" class="botonFormulario">Cargar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection