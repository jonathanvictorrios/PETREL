@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Petrel - Modificar Carrera')@endphp

@include('estructura/header')
<main class="p-2" id="cuerpo"> {{-- Inicio main cuerpo --}}
    <div class="container mt-3">
        <a href="{{url()->previous()}}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>
    {{-- inicio formulario editar carrera --}}
    <div class="container-fluid mb-5 p-1 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                <div class="card card-form">
                    <div class="row tittle border-bottom p-2">
                        <h2 class="col text-center fw-bold">Modificar Carpeta Carrera</h2>
                    </div>
                    <form class="form-card" action="{{ route('carrera.update', $carpetaCarrera->id_carpeta_carrera) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        {{-- ingrese carrera --}}
                        @method('put')
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-12 flex-column d-flex py-3">
                                <label class="form-control-label px-3 py-2">Carrera</label>
                                <input class="border-0 cell" type="text" id="idCarpetaCarrera" name="idCarpetaCarrera" value="{{ old('idCarpetaCarrera', $carpetaCarrera->carrera->carrera) }}">
                            </div>
                        </div>
                        <div class="row justify-content-center text-center py-4">
                            <div class="form-group col col-sm-6">
                                <button id="boton" name="boton" type="submit" class="btn-block w-100 p-1 rounded-2">Modificar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
{{-- <form action="{{ route('carrera.update', $carpetaCarrera->id_carpeta_carrera) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <p> {{$carpetaCarrera->carrera->carrera.' '.$carpetaCarrera->carpeta_anio->numero_anio}}</p>
    @method('put')
    Nombre de la carrera:
    <input type="text" id="idCarpetaCarrera" name="idCarpetaCarrera" value="{{ old('idCarpetaCarrera', $carpetaCarrera->carrera->carrera) }}">
    <input type="submit" value="enviar">
</form> --}}