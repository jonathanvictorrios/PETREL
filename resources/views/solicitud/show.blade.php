@extends('estructura/layout')

@section('cuerpo')
@php($titulo = 'Petrel - Ver detalles solicitud')

@include('estructura/header')
<main class=p-2 id=cuerpo> <!-- Inicio main cuerpo -->
    {{------------------ ESTE ES EL SHOW DE ESTUDIANTE ----------------------------------------}}
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
                    <p class=" "><span class="text-secondary fs-5">Estado: </span> en progreso{{-- ACÀ DEBE IR ESTADO DE ESTUDIANTE{{$solicitud->UltimoEstado}}</p>  --}}
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
        </div>
    </div>
</div>


{{------------------ ESTE ES EL SHOW DE ADMINISTRATIVO DEPTO ALUMNOS ----------------------------------------}}
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
                 <p class=" "><span class="text-secondary fs-5">Estado: </span> en depto alumnos{{-- ACÀ DEBE IR ESTADO DE SOLICITUD NO ASIGNACIÒN{{$solicitud->UltimoEstado}}</p>  --}}
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
                {{-- asignado a --}}
                <div class="row justify-content-center text-left">
                    <div class="col-6">
                        <p class=" "><span class="text-secondary fs-5">Asignado a: </span> Viviana Pedrero {{-- ACÀ DEBE TOMAR EL NOMBRE DE PERSONA ASIGNADA--}}</p>      
                    </div>
                    <div class="col-6">
                        <button class=" botonFormulario">cambiar asignación </button>  {{-- ACÀ abre pag de asignaciòn o lo convertimos en un form con un select de admin?--}}</p>      
                    </div>
                </div>
        </div>
       
            <div class="tittle cp-1 cell my-3">
                <h2 class="text-center fw-bold">Actividad </h2>
            </div>
            <table class="table table-borderless">

                <thead class= "border-bottom">
                  <tr>
                    
                    <th scope="col">Fecha</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Detalle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                   
                    <td>12/05/2021</td>
                    <td>Viviana Pedrero</td>
                    <td>asignado a Raquel</td>
                  </tr>
                  <tr>
                    
                    <td>12/05/2021</td>
                    <td>Viviana Pedrero</td>
                    <td>comentario 2 blablablablablalbalba</td>
                  </tr>
                  <tr>
                    
                    <td>12/05/2021</td>
                    <td>Viviana Pedrero</td>
                    <td>asignado a Raquel</td>
                  </tr>
                  </tr>
                </tbody>
              </table>
        </div>
        <div class="row justify-content-center ">
            <div class="col-6 p-2 m-2">
                {{-- ESTE FORM/BOTÒN DEBERIA SER VISIBLE SÒLO SI EL USUARIO ASIGNADO ES EL USUARIO LOGUEADO --}}
                <form action="{{ route('hojaResumen.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    {{--aca voy a recibir el $idSolicitud , por ahora utilizo un input , luego este $idSolicitud estara en un campo oculto --}}
                    <input type="hidden" id="idSolicitud" name="idSolicitud" value= "{{ $solicitud->idSolicitud}}">
                    <input type="submit" value="enviar">
                </form>
                <button id= "" class="botonFormulario">comenzar trámite</button>
            </div>
        </div>
    </div>
</div>
</div>

</main> <!-- Fin main cuerpo -->

@endsection
