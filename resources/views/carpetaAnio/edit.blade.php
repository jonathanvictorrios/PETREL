@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Modificar Año - Petrel')@endphp

@include('estructura/header')
<main class="p-2" id="cuerpo"> {{-- Inicio main cuerpo --}}
    <div class="container mt-3">
        <a href="{{url()->previous()}}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>
    {{-- inicio formulario editar año --}}
    <div class="container-fluid mb-5 p-1 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                <div class="card card-form">
                    <div class="row tittle border-bottom p-2">
                        <h2 class="col text-center fw-bold">Modificar Carpeta Año</h2>
                    </div>
                    <form class="form-card" action="{{ route('anio.update', $carpetaAnio->id_carpeta_anio) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        {{-- ingrese año --}}
                        @method('put')
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-12 flex-column d-flex py-3">
                                <label class="form-control py-2">Año</label>
                                <input class="border-0 cell" type="number" id="anio" name="anio" value="{{ old('anio', $carpetaAnio->numero_anio) }}">
                            </div>
                        </div>
                        <div class="row justify-content-center text-center py-4">
                            <div class="form-group col col-sm-6">
                                <button id="boton" name="boton" type="submit" class="botonFormulario">Modificar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

    {{-- @extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<form action="{{ route('anio.update', $carpetaAnio->id_carpeta_anio) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <h1>Modificando una carpeta de año</h1>
    @method('put')
    Carpeta año:
    <input type="number" id="anio" name="anio" value="{{ old('anio', $carpetaAnio->numero_anio) }}">
    <input type="submit" value="enviar">
</form>

@endsection
