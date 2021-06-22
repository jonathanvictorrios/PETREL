@extends('estructura/layout')

@section('cuerpo')
@php($titulo = 'Petrel - Ver detalles solicitud')

@include('estructura/header')
<main class=p-2 id=cuerpo> <!-- Inicio main cuerpo -->
    <div class=container>
        <a href="{{url()->previous()}}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>
{{-- inicion mostrar solicitud --}}
<div class="container-fluid p-1 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-12">

            <div class="card card-form bg-light">
                <div class="tittle card-header p-1 bg-light cell mb-3">
                    <h2 class="text-center fw-bold">Detalles de Solicitud {{$solicitud->idSolicitud}}</h2>
                </div>
                {{-- fecha --}}
                <div class="row justify-content-between text-left ">
                    <p class=" "><span class="text-secondary fs-5">Fecha de Inicio: </span> {{$solicitud->FechaUltimoEstado}}</p> 
                </div>
                 {{-- estado --}}
                <div class="row justify-content-between text-left ">
                    <p class=" "><span class="text-secondary fs-5">Estado: </span> {{$solicitud->UltimoEstado}}</p> 
                </div>
               
                {{-- nombres y apellidos --}}
                    <div class="row justify-content-between text-left">
                            <p class=" "><span class="text-secondary fs-5">Solicitante: </span> {{$solicitud->UsuarioEstudiante}}</p>  
                    </div>
                    {{-- legajo --}}
                    <div class="row justify-content-between text-left ">
                        <p class=" "><span class="text-secondary fs-5">Legajo: </span> {{$solicitud->Legajo}}</p>  
                    </div>
                   {{-- unidad academica --}}
                    <div class="row justify-content-between text-left">
                        <p class=" "><span class="text-secondary fs-5">Unidad Académica: </span> {{$solicitud->UnidadAcademica}}</p>      
                    </div>
                    {{-- carrera --}}
                    <div class="row justify-content-between text-left ">
                        <p class=" "><span class="text-secondary fs-5">Carrera: </span> {{$solicitud->Carrera}}</p>      
                    </div>
                    {{-- universidad de destino --}}
                    <div class="row justify-content-center text-left">
                        <p class=" "><span class="text-secondary fs-5">Institución Educativa de Destino: </span> {{$solicitud->UniversidadDestino}}</p>      
                    </div>
            </div>
            <div class="row justify-content-center ">
                <div class="col-6 p-2 m-2">
                    <button id= "" class="botonFormulario">comenzar trámite</button>
                </div>
            </div>
        </div>
    </div>
</div>

</main> <!-- Fin main cuerpo -->

@endsection
