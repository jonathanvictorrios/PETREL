<<<<<<< HEAD
@extends('estructura.layout')

@section('cuerpo')
=======
@extends('estructura/layout')

@section('cuerpo')
@php($titulo = 'Petrel - Ver detalles solicitud')
>>>>>>> f09a10bbe7623fa4eeb328d77ee2242ebcd87d94

@include('estructura/header')
<main class="p-5" id=cuerpo> <!-- Inicio main cuerpo -->
    <div class="container p-5">
        <a href="{{url()->previous()}}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>
{{-- inicion mostrar solicitud --}}
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11">
            <div class="tittle">
                <h2 class="text-center fw-bold">Detalles de Solicitud</h2>
            </div>
            <div class="card card-form">
                {{-- fecha y estado --}}
                <div class="row justify-content-between text-left cell">
                    <div class="form-group col-sm-6 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Fecha de Inicio</label>
                            <input type="text" id="fecha" class="fecha border-0" value="{{$solicitud->FechaUltimoEstado}}" disabled>
                    </div>
                    <div class="form-group col-sm-6 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Estado</label>
                            <input type="text" id="estado" class="estado border-0" value='{{$solicitud->UltimoEstado}}'disabled>
                    </div>
                </div>
                {{-- nombres y apellidos --}}
                    <div class="row justify-content-between text-left cell">
                        <div class="form-group col-sm-6 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Nombres</label>
                            <input type="text" id="nombre " class="nombre border-0" name="nombre" disabled>
                             <input type="text" id="nombre " class="nombre border-0" name="nombre" value='{{$solicitud->UsuarioEstudiante}}' disabled> 
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Apellidos</label>
                            <input type="text" id="apellido" class="apellido border-0" name="apellido" disabled>
                             <input type="text" id="apellido" class="apellido border-0" name="apellido" value='{{$solicitud->UsuarioEstudiante}}' disabled> 
                        </div>
                    </div>
                    {{-- legajo --}}
                    <div class="row justify-content-between text-left cell">
                        <div class="form-group col-sm-6 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Legajo</label>
                            <input type="text" id="legajo" class="legajo border-0" name='legajo' disabled>
                            <input type="text" id="legajo" class="legajo border-0" name='legajo' value='{{$solicitud->Legajo}}' disabled>
                        </div>
                    </div>
                   {{-- unidad academica --}}
                    <div class="row justify-content-between text-left cell">
                        <div class="form-group col-12 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Unidad Académica</label>
                            <input type="text" id="unidad" class="unidad border-0" name="unidadAcademica" disabled>
                             <input type="text" id="unidad" class="unidad border-0" name="unidadAcademica" value='{{$solicitud->UnidadAcademica}}' disabled> 
                        </div>
                    </div>
                    {{-- carrera --}}
                    <div class="row justify-content-between text-left cell">
                        <div class="form-group col-12 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Carrera</label>
                            <input type="text" id="carrera" class="carrera border-0" name='carrera' disabled>
                             <input type="text" id="carrera" class="carrera border-0" name='carrera' value='{{$solicitud->Carrera}}' disabled> 
                        </div>
                    </div>
                    {{-- universidad de destino --}}
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Universidad de Destino</label>
                            <input type="text" id="destino" class="destino border-0" name='universidadDestino' disabled>
                             <input type="text" id="destino" class="destino border-0" name='universidadDestino' value="{{$solicitud->UniversidadDestino}}" disabled>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
{{-- fin mostrar solicitud --}}

{{-- <div class="row">
    <div class="col col-8">
    <label class="form-label" for="">Nombre:</label>
    <input type="text"  class='form-control' value='{{$solicitud->usuarioEstudiante->nombre}}' disabled>
    </div>
    <div class="col col-4">
    <label class="form-label" for="">Legajo</label>
    <input type="text" class='form-control' name='legajo' value='{{$solicitud->legajo}}' disabled>
    </div>
</div>

<div class="row">
    <div class="col-col-12">
        <label class="form-label" for="">Universidad Destino</label>
        <input class='form-control' type="text" name='universidadDestino' value="{{$solicitud->universidad_destino}}" disabled>
    </div>
</div>

<div class="row">
<div class="col-col-12">
        <label class="form-label" for="">Unidad Academica</label>
        <input class='form-control' type="text" name="unidadAcademica" value='{{$solicitud->unidadAcademica->unidad_academica}}' disabled>
    </div>
</div>

<div class="row">
<div class="col-col-12">
        <label class="form-label" for="">Carrera</label>
        <input class='form-control' type="text" name='carrera' value='{{$solicitud->carrera->carrera}}' disabled>
    </div>
</div>

<a href="{{route('solicitud.index')}}" class='btn btn-primary'>Volver</a> --}}

</main> <!-- Fin main cuerpo -->

@endsection
