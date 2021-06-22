<<<<<<< HEAD
@extends('estructura.layout')

@section('cuerpo')
<a href="{{route('solicitud.create')}}" class='btn btn-primary'>+</a>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nro Solicitud</th>
      <th scope="col">Nombre y Apellido</th>
      <th scope="col">Legajo</th>
      <th scope="col">Carrera</th>
      <th scope="col">Unidad Academica</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach($solicitudes as $solicitud)
    <tr>
      <th scope="row">{{$solicitud->id_solicitud}}</th>
      <td>{{$solicitud->usuarioEstudiante->apellido}} {{$solicitud->usuarioEstudiante->nombre}}</td>
      <td>{{$solicitud->legajo}}</td>
      <td>{{$solicitud->carrera->carrera}}</td>
      <td>{{$solicitud->unidadAcademica->unidad_academica}}</td>
      <td><a href="{{route('solicitud.show',$solicitud->id_solicitud)}}">Ver</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
=======
@extends('estructura/layout')

@section('cuerpo')
@php($titulo = 'Petrel - Listado solicitudes')

@include('estructura/header')

<div id="nav-solicitud" class="container shadow-lg my-5 bg-light rounded">
  <!-- Solicitudes -->
  <div class="container px-md-5 px-3 py-5">
    <h3>Mis solicitudes</h3>
    <div class="pt-2 justify-content-between d-flex align-items-center">
      <div class="nav nav-tabs col-9" id="v-tabs-tab" role="tablist">
        <a class=" nav-link py-3 px-4 active" id="v-tabs-actuales-tab" data-bs-toggle="tab" href="#v-tabs-actuales" role="tab" aria-controls="v-tabs-actuales" aria-selected="true">Actuales</a>
        <a class="nav-link ms-2 py-3 px-4" id="v-tabs-completas-tab" data-bs-toggle="tab" href="#v-tabs-completas" role="tab" aria-controls="v-tabs-completas" aria-selected="false">Completadas</a>
      </div>
      <div class="col-3 text-end">
        <a href="{{route('solicitud.create')}}" class='btn btn-primary btn-round'>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
          </svg>
        </a>
      </div>
    </div>
    <!-- Tablas Actuales -->
    <div class="tab-content flex-grow-1 bg-white" id="v-tabs-tabContent">
      <div class="tab-pane fade show active " id="v-tabs-actuales" role="tabpanel" aria-labelledby="v-tabs-actuales-tab">
        <div id="solicitud-usuario" class="row g-0">
          <div class="col p-4">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Nro Solicitud</th>
                    <th scope="col">Solicitante</th>
                    <th scope="col">Legajo</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Unidad Académica</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($solicitudes as $solicitud)
                  @if($solicitud->UltimoEstado!='Terminado')
                  <tr>
                    <th scope="row">{{$solicitud->idSolicitud}}</th>
                    <td>{{$solicitud->UsuarioEstudiante}}</td>
                    <td>{{$solicitud->Legajo}}</td>
                    <td>{{$solicitud->Carrera}}</td>
                    <td>{{$solicitud->UnidadAcademica}}</td>
                    <td><a href="{{route('solicitud.show',$solicitud->idSolicitud)}}">Ver</a></td>
                    <td><a href="{{route('solicitud.asignar',[$solicitud->idSolicitud,2])}}">Asignar</a></td> {{--El parametro 2 corresponde al idUsuarioAdministrativo que este logueado--}} 

                   
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Tablas Completas -->
      <div class="tab-pane fade" id="v-tabs-completas" role="tabpanel" aria-labelledby="v-tabs-completas-tab">
        <div id="solicitud-usuario" class="row g-0">
          <div class="col p-4">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Nro Solicitud</th>
                    <th scope="col">Solicitante</th>
                    <th scope="col">Legajo</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Unidad Academica</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($solicitudes as $solicitud)
                  @if($solicitud->UltimoEstado=='Terminado')
                  <tr>
                    <th scope="row">{{$solicitud->idSolicitud}}</th>
                    <td>{{$solicitud->UsuarioEstudiante}} </td>
                    <td>{{$solicitud->Legajo}}</td>
                    <td>{{$solicitud->Carrera}}</td>
                    <td>{{$solicitud->UnidadAcademica}}</td>
                    <td><a href="{{route('solicitud.show',$solicitud->idSolicitud)}}">Ver</a></td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<<<<<<< HEAD

<div class="container my-5">
  <div class="px-5">

  </div>
</div>

>>>>>>> f09a10bbe7623fa4eeb328d77ee2242ebcd87d94
=======
>>>>>>> 326b081d4eff71ec4cf5e3543bacf60db083b0a3
@endsection