@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Crear Carrera - Petrel')@endphp
@include('estructura/header')

<main class="p-2" id="cuerpo"> {{-- Inicio main cuerpo --}}
    <div class="container mt-3">
        <a href="{{url()->previous()}}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>

    {{-- inicio formulario nueva carrera --}}
    <div class="container-fluid mb-5 p-1 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                <div class="card card-form">
                    <div class="row tittle border-bottom p-2">
                        <h2 class="col text-center fw-bold">Nueva Carpeta Carrera</h2>
                    </div>
                    <form class="form-card" action="{{ route('carrera.store') }}" method="POST" autocomplete="off">
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
                        {{-- ingrese carrera --}}
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-12 flex-column d-flex py-3">
                                <label class="form-label py-2">Carrera</label>
                                <input class="border-0 cell" type="text" id="carrera" name="carrera" value="{{ old('carrera') }}" placeholder="Ingrese el nombre de la carrera">
                            </div>
                        </div>
                        {{-- id año correspondiente --}}
                        <input type="hidden" id="idCarpetaAnio" name="idCarpetaAnio" value="{{ $carpetaAnio->id_carpeta_anio }}">

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
    @endsection
    {{-- @extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<form action="{{ route('carrera.store') }}" method="POST" autocomplete="off">
    @csrf
    <p>Creando una carpeta carrera en año: {{$carpetaAnio->numero_anio}}</p>
    <input type="hidden" id="idCarpetaAnio" name="idCarpetaAnio" value="{{ $carpetaAnio->id_carpeta_anio }}">
    Nombre Carrera:
    <select id="idCarrera" name="idCarrera">
        <option value="">Elegir Carrera</option>
        @foreach ($carreras as $carrera)
            <option value="{{$carrera->id_carrera}}">{{$carrera->carrera}}</option>
        @endforeach
      </select>
    <input type="submit" value="enviar">
</form>

@endsection
