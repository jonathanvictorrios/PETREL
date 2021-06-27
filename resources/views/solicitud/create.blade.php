@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Crear solicitud - Petrel')
@include('estructura/header')

<main class="p-2" id="cuerpo"> {{-- Inicio main cuerpo --}}
    <div class="container mt-3">
        <a href="{{url()->previous()}}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>

    {{-- inicio formulario nueva solicitud --}}
    <div class="container-fluid mb-5 p-1 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                <div class="card card-form">
                    <div class="row tittle border-bottom p-2">
                        <h2 class="col text-center fw-bold">Nueva Solicitud</h2>
                    </div>
                    <form name=formCreate id=formCreate action="route('solicitud.store')" method=POST novalidate>
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
                        {{-- ingrese nombre y apellido --}}
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-sm-6 flex-column d-flex py-3">
                                <label class="form-label py-2">Nombres</label>
                                <input class="border-0 cell" type="text" id="nombre" name="nombre" placeholder="Ingrese todos sus nombres" value="{{old('nombre')}}">
                            </div>
                            <div class="form-group col col-sm-6 flex-column d-flex py-3">
                                <label class="form-label py-2">Apellidos</label>
                                <input class="border-0 cell" type="text" id="apellido" name="apellido" placeholder="Ingrese todos sus apellidos" value="{{old('apellido')}}">
                            </div>
                        </div>
                        {{-- elija unidad academica e ingrese el legajo --}}
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-sm-6 flex-column d-flex py-3">
                                <label class="form-label py-2">Legajo</label>
                                <input class="border-0 cell" type="text" id="legajo" name="legajo" placeholder="Ingrese su legajo sin guion" value="{{old('legajo')}}" required>
                            </div>
                            <div class="form-group col col-sm-6 flex-column d-flex py-3">
                                <label class="form-label py-2">Unidad Académica</label>
                                <select class="form-select border-0 rounded-0 cell" aria-label="Seleccionar unidad académica en el menú desplegable" id="unidadAcademica" name="unidadAcademica" required>
                                    {{-- @foreach($unidadesAcademicas as $unidad)
                                <option value="{{$unidad->id_unidad_academica}}">{{$unidad->unidad_academica}}</option>
                                    @endforeach
                                    --}}
                                </select>
                            </div>
                        </div>

                        {{-- elija la carrera --}}
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-12 flex-column d-flex py-3">
                                <label class="form-label py-2">Carrera</label>
                                <select class="form-select border-0 rounded-0 cell" aria-label="Seleccionar carrera en el menú desplegable" id="carrera" name="carrera" value="{{old('carrera')}}" required>
                                    {{-- @foreach($unidadesAcademicas as $unidad)
                                <option value="{{$unidad->id_unidad_academica}}">{{$unidad->unidad_academica}}</option>
                                    @endforeach
                                    --}}
                                </select>
                            </div>
                        </div>
                        {{-- ingrese universidad de destino --}}
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-12 flex-column d-flex py-3">
                                <label class="form-label py-2">Institución Educativa de Destino</label>
                                <input class="border-0 cell" type="text" id='universidadDestino' name='universidadDestino' placeholder="Ingrese la Institución Educativa de destino" value="{{old('universidadDestino')}}" required>
                            </div>
                        </div>
                        {{-- opcion extranjero --}}
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-12 py-3">
                                <label class="form-label py-2">¿La Institución Educativa es extranjera?</label>
                                <fieldset class="pb-3">
                                    {{-- <legend class="col-form-label col-12 pt-0">¿La Institución Educativa es extranjera?</legend> --}}
                                    <div class="col-12">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="extranjero" id="extranjero" value="si">
                                            <label class="form-check-label" for="extranjero">Si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="extranjero" id="extranjero" value="no">
                                            <label class="form-check-label" for="extranjero">No</label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="row justify-content-center text-center py-4">
                            <div class="form-group col col-sm-6">
                                <button id="boton" name="boton" type="submit" class="botonFormulario">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- fin formulario nueva solicitud --}}
</main> <!-- Fin main cuerpo -->

@endsection
