@extends('estructura/layout')

@section('cuerpo')
@php($titulo = 'Petrel - Listado solicitudes')

@include('estructura/header')

<div id="nav-solicitud" class="container shadow-lg mt-5 pb-3 bg-light rounded">
  {{-- <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white rounded-top">
    <!-- Container wrapper -->
    <div class="container-fluid pe-4">
      <!-- Navbar brand -->
      <a class="navbar-brand bg-brand py-2 px-5 rounded-top rounded-end" href="/">
        <img src={{ asset('img/logo_petrel-02.png') }} alt="Logo Petrel" width="60">
      </a>
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- User -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <!-- Icon usuario -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle color-user fs-3" data-toggle="dropdown">
              <span class="fas fa-user fa-fw" aria-hidden="true" title="User"></span> Lara Galaz
            </a>
            <div id="login-dp" class="dropdown-menu">
              <a class="dropdown-item" href="../index/perfil.php">
                <span class="fas fa-user fa-fw" aria-hidden="true" title="Perfil"></span> Perfil </a>
              <a class="dropdown-item" href="../index/configuracion.php"><span class="fas fa-cog fa-fw " aria-hidden="true" title="Configuración"></span> Configuración</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item logout" href="#"><span class="fas fa-sign-out-alt fa-fw" aria-hidden="true" title="Cerrar sesión"></span> Cerrar sesión</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <!-- Container wrapper -->
  </nav> --}}
  <!-- Solicitudes -->
  <div class="container my-5 px-5">
    <h3>Mis solicitudes</h3>
    <div class="justify-content-between d-flex align-items-center">
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
                    <th scope="col">Nombre y Apellido</th>
                    <th scope="col">Legajo</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Unidad Académica</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($solicitudes as $solicitud)
                  <tr>
                    <th scope="row">{{$solicitud->idSolicitud}}</th>
                    <td>{{$solicitud->UsuarioEstudiante}}</td>
                    <td>{{$solicitud->Legajo}}</td>
                    <td>{{$solicitud->Carrera}}</td>
                    <td>{{$solicitud->UnidadAcademica}}</td>
                    <td><a href="{{route('solicitud.show',$solicitud->id_solicitud)}}">Ver</a></td>
                  </tr>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container my-5">
  <div class="px-5">

  </div>
</div>

@endsection