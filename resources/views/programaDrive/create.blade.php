@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Crear programa - Petrel')@endphp
@include('estructura/header')

<main class="p-2" id="cuerpo"> {{-- Inicio main cuerpo --}}
    <div class="container mt-3">
        <a href="{{url()->previous()}}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>

    {{-- inicio de Crear programa --}}
    <div class="container-fluid mb-5 p-1 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                <div class="card card-form">
                    <div class="row tittle border-bottom p-2">
                        <h2 class="col text-center fw-bold">Nuevo Programa</h2>
                    </div>
                    <form class="" action="{{ route('programaDrive.store') }}" method="POST" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col col-sm-6 flex-column d-flex py-3">
                                <label class="form-label py-2">Nombre Materia</label>
                                <input class="border-0 cell" type="text" id="nombrePrograma" name="nombrePrograma" value="{{ old('nombrePrograma') }}" placeholder="ingrese el nombre de la materia">
                            </div>
                            <div class="form-group col col-sm-6 flex-column d-flex py-3">
                                <label class="form-label py-2">Numero Materia</label>
                                <input class="border-0 cell" type="text" id="numeroPrograma" name="numeroPrograma"
                                    value="{{ old('numeroPrograma') }}" placeholder="ingrese el numero de la materia">
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-12 flex-column d-flex py-3">
                                <label class="form-label py-2">Archivo</label>
                                <input class="border-0" type="file" id="pdfPrograma" name="pdfPrograma"
                                    value="{{ old('pdfPrograma') }}">

                            </div>

                        </div>
                        <input type="hidden" id="idCarpetaCarrera" name="idCarpetaCarrera"
                            value="{{ $carpetaCarrera->id_carpeta_carrera }}">
                        <div class="row justify-content-center text-center py-4">
                            <div class="form-group col col-sm-6">
                                <button id="boton" name="boton" type="submit" class="botonFormulario">Crear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main> <!-- Fin main cuerpo -->

@endsection