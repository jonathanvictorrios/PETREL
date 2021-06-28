@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Ver detalles solicitud - Petrel')@endphp
@include('estructura/header')

<main class="p-2" id="cuerpo">
    {{-- Inicio main cuerpo --}}
    {{-- ---------------- ESTE ES EL SHOW DE ESTUDIANTE -------------------------------------- --}}
    <div class="container">
        <a href="{{ url()->previous() }}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>
    {{-- inicion mostrar solicitud --}}
    <div class="container-fluid p-1 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <div class="card card-form bg-light">
                    <div class="card-header p-1 bg-light cell mb-3">
                        <h2 class="text-center fw-bold">Detalles de Solicitud {{ $solicitud->idSolicitud }}</h2>
                    </div>
                    {{-- fecha --}}
                    <div class="row justify-content-between text-left ">
                        <p class=" "><span class="text-secondary fs-5">Fecha de Inicio: </span>
                            {{ $solicitud->FechaUltimoEstado }}
                        </p>
                    </div>
                    {{-- estado --}}
                    <div class="row justify-content-between text-left ">
                        <p class=" "><span class="text-secondary fs-5">Estado: </span> {{$solicitud->UltimoEstado}}</p>
                    </div>

                    {{-- nombres y apellidos --}}
                    <div class="row justify-content-between text-left">
                        <p class=" "><span class="text-secondary fs-5">Solicitante: </span>
                            {{ $solicitud->UsuarioEstudiante }}
                        </p>
                    </div>
                    {{-- legajo --}}
                    <div class="row justify-content-between text-left ">
                        <p class=" "><span class="text-secondary fs-5">Legajo: </span> {{ $solicitud->Legajo }}</p>
                    </div>
                    {{-- unidad academica --}}
                    <div class="row justify-content-between text-left">
                        <p class=" "><span class="text-secondary fs-5">Unidad Académica: </span>
                            {{ $solicitud->UnidadAcademica }}
                        </p>
                    </div>
                    {{-- carrera --}}
                    <div class="row justify-content-between text-left ">
                        <p class=" "><span class="text-secondary fs-5">Carrera: </span> {{ $solicitud->Carrera }}</p>
                    </div>
                    {{-- universidad de destino --}}
                    <div class="row justify-content-center text-left">
                        <p class=" "><span class="text-secondary fs-5">Institución Educativa de Destino: </span>
                            {{ $solicitud->UniversidadDestino }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    {{-- ---------------- ESTE ES EL SHOW DE ADMINISTRATIVO DEPTO ALUMNOS -------------------------------------- --}}
    <div class="container">
        <a href="{{ url()->previous() }}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>
    {{-- inicion mostrar solicitud --}}
    <div class="container-fluid p-1 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <div class="card card-form bg-light">
                    <div class="card-header p-1 bg-light cell mb-3">
                        <h2 class="text-center fw-bold">Detalles de Solicitud {{ $solicitud->idSolicitud }}</h2>
                    </div>
                    {{-- fecha --}}
                    <div class="row justify-content-between text-left ">
                        <p class=" "><span class="text-secondary fs-5">Fecha de Inicio: </span>
                            {{ $solicitud->FechaUltimoEstado }}
                        </p>
                    </div>
                    {{-- estado --}}
                    <div class="row justify-content-between text-left ">
                        <p class=" "><span class="text-secondary fs-5">Estado: </span> {{$solicitud->UltimoEstado}}
                        </p> 
                    </div>

                    {{-- nombres y apellidos --}}
                    <div class="row justify-content-between text-left">
                        <p class=" "><span class="text-secondary fs-5">Solicitante: </span>
                            {{ $solicitud->UsuarioEstudiante }}
                        </p>
                    </div>
                    {{-- legajo --}}
                    <div class="row justify-content-between text-left ">
                        <p class=" "><span class="text-secondary fs-5">Legajo: </span> {{ $solicitud->Legajo }}</p>
                    </div>
                    {{-- unidad academica --}}
                    <div class="row justify-content-between text-left">
                        <p class=" "><span class="text-secondary fs-5">Unidad Académica: </span>
                            {{ $solicitud->UnidadAcademica }}
                        </p>
                    </div>
                    {{-- carrera --}}
                    <div class="row justify-content-between text-left ">
                        <p class=" "><span class="text-secondary fs-5">Carrera: </span> {{ $solicitud->Carrera }}</p>
                    </div>
                    {{-- universidad de destino --}}
                    <div class="row justify-content-center text-left">
                        <p class=" "><span class="text-secondary fs-5">Institución Educativa de Destino: </span>
                            {{ $solicitud->UniversidadDestino }}
                        </p>
                    </div>
                    {{-- asignado a --}}
                    <div class="row justify-content-center text-left">
                        <div class="col-12">
                            <p class=" "><span class="text-secondary fs-5">Solicitud asignada a: </span></p>
                        </div>   
                       {{-- ACÀ DEBE TOMAR EL NOMBRE DE PERSONA ASIGNADA mostrarlo y guardarlo en base de datos--}}       
                        {{-- dejo este select como muestra visual, 
                        hay que eliminarlo al hacer el real de arriba --}}
                        <form action="" method="">
                            <div class="col-12">  
                            <select class="btn botonFormulario3 w-100 " name="">
                                <option value="0">Elegir Persona</option>
                                        <option value="1">Mario Domini</option>
                                        <option value="2">Rosa Piper</option>
                                        <option value="3">Catalina Blum</option>
                                        <option value="4">Ricardo Ford</option>
                                </select>
                                <br>
                        </div>
                        <div class="col-12 mt-2">
                            <button type="submit" class=" botonFormulario2">Asignar/cambiar asignación </button> {{-- botòn que guarda en la base --}}</p>
                        </div>
                        </form>
                    </div>
                
       
    

     {{-- Comienzo div Actividad (mostrar como acordeón) --}}
         <div class="row d-flex justify-content-center">
             <div class="col-12  p-2">
                <div class="accordion" id="acordeonComentarios">
                    <div class="accordion-item mt-4">
                        
                        <button class="accordion-button collapsed justify-content-center acordeonComentarios" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">   
                            <h2 class="align-self-center" id="headingOne"> Actividad </h2>
                        </button>
                    
                      <div id="collapseOne" class="accordion-collapse collapse justify-content-center" aria-labelledby="headingOne" data-bs-parent="#acordeonComentarios">
                        <div class="accordion-body  d-flex justify-content-center">
                            <div class="table-responsive col-12 mx-3">
                                <table class="table table-striped table-hover align-middle table-borderless">
                                    <thead class="border-bottom">
                                        <tr>
                                            <th scope="col" class="p-2 text-center">Fecha</th>
                                            <th scope="col" class="p-2 text-center">Usuario</th>
                                            <th scope="col" class="p-2 text-center">Detalle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="p-2">12/05/2021</td>
                                            <td class="p-2">Viviana Pedrero</td> 
                                            <td class="p-2">asignado a Raquel sdhakshaksdas dbahsbdhamsbdasbdjasbdajsdbaksdhakhs dbahmsdbahmsdbahmsbdamsbdamhsbdahsbfkhasbfhasfbmahsfbamsfbamhsbfmhasfaf</td>
                                        </tr>
                                       
                                        <tr>
                                            <td class="p-2">12/05/2021</td>
                                            <td class="p-2">Viviana Pedrero</td> 
                                            <td class="p-2">asignado a Raquel sdhakshaksdas dbahsbdhamsbdasbdjasbdajsdbaksdhakhs dbahmsdbahmsdbahmsbdamsbdamhsbdahsbfkhasbfhasfbmahsfbamsfbamhsbfmhasfaf</td>
                                        </tr>
                                      
                                        <tr>
                                            <td class="p-2">12/05/2021</td>
                                            <td class="p-2">Viviana Pedrero</td> 
                                            <td class="p-2">asignado a Raquel sdhakshaksdas dbahsbdhamsbdasbdjasbdajsdbaksdhakhs dbahmsdbahmsdbahmsbdamsbdamhsbdahsbfkhasbfhasfbmahsfbamsfbamhsbfmhasfaf</td>
                                        </tr>
                                    </tbody>
                                </table>                        
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div> 
    </div> {{-- Fin div Actividad --}}

        
        <div class="row justify-content-center">
            <div class="col-12 mt-2 p-2 ">
                {{-- ESTE FORM/BOTÒN DEBERIA SER VISIBLE SÒLO SI EL USUARIO ASIGNADO ES EL USUARIO LOGUEADO --}}
                <form action="{{ route('hojaResumen.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    {{-- aca voy a recibir el $idSolicitud , por ahora utilizo un input , luego este $idSolicitud estara en un campo oculto --}}
                    <input type="hidden" id="idSolicitud" name="idSolicitud" value="{{ $solicitud->idSolicitud }}">
                    <input type="submit" class="botonFormulario" value="comenzar trámite">
                </form>
            </div>
        </div>
    </div>
    </div>
    </div> 
</div>
</div>

</main> {{-- Fin main cuerpo --}}


@endsection