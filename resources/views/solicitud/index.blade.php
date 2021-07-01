@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Listado solicitudes - Petrel')@endphp
@include('estructura/header')

<main class="p-2" id="cuerpo">

    {{-- Tabla Solicitudes - Estudiante @can('realizaSolicitud') --}}
    <div id="nav-tabs-solicitud" class="container shadow-lg my-5 bg-light rounded">

        @if (session('mensaje') ) {{-- Mensaje final luego de submit --}}
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center m-3 p-3">
            <i class='fas fa-check-circle mx-2'></i>{{ session('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- Solicitudes -->
        <div class="container px-md-5 px-3 py-5">
            <div class="row justify-content-center">
                <div class="col-6 text-start">
                    <h3>Mis solicitudes</h3>
                </div>
                <!-- Boton agregar anio -->
                <div class="col-6 text-end pb-2">
                    <a href="{{route('anio.create')}}" class='btn btn-create'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                            </path>
                        </svg>
                    </a>
                </div>
                <!-- Fin Boton agregar anio -->
            </div>
            <div class="pt-2 justify-content-between d-flex align-items-center">
                <!-- NAV-TABS -->
                <div class="nav nav-tabs col-12" id="v-tabs-tab" role="tablist">
                    <a class=" nav-link py-3 px-4 active" id="v-tabs-actuales-tab" data-bs-toggle="tab" href="#v-tabs-actuales" role="tab" aria-controls="v-tabs-actuales" aria-selected="true">Actuales</a>
                    <a class="nav-link ms-2 py-3 px-4" id="v-tabs-completas-tab" data-bs-toggle="tab" href="#v-tabs-completas" role="tab" aria-controls="v-tabs-completas" aria-selected="false">Completadas</a>
                </div>
                <!-- Fin NAV-TABS -->
            </div>
            <!-- Tabla Actuales -->
            <div class="tab-content flex-grow-1 bg-white" id="v-tabs-tabContent">
                <div class="tab-pane fade show active" id="v-tabs-actuales" role="tabpanel" aria-labelledby="v-tabs-actuales-tab">
                    <div id="solicitud-usuario" class="row g-0">
                        <div class="col py-2 px-3">
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
                                        @if($solicitud->estados->last()->estado_descripcion->descripcion!='Terminado')
                                        <tr>
                                            <th scope="row">{{$solicitud->id_solicitud}}</th>
                                            <td>{{$solicitud->usuarioEstudiante->apellido}}, {{$solicitud->usuarioEstudiante->nombre}}</td>
                                            <td>{{$solicitud->legajo}}</td>
                                            <td>{{$solicitud->carrera->carrera}}</td>
                                            <td>{{$solicitud->carrera->unidad_academica->unidad_academica}}</td>
                                            <td><a href="{{route('solicitud.show',$solicitud->id_solicitud)}}">Ver Más</a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin Tabla Actuales -->
                <!-- Tabla Completas -->
                <div class="tab-pane fade" id="v-tabs-completas" role="tabpanel" aria-labelledby="v-tabs-completas-tab">
                    <div id="solicitud-usuario" class="row g-0">
                        <div class="col py-2 px-3">
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
                                        @if($solicitud->estados->last()->estado_descripcion->descripcion!=='Terminado')
                                        <tr>
                                            <th scope="row">{{$solicitud->id_solicitud}}</th>
                                            <td>{{$solicitud->usuarioEstudiante->apellido}}, {{$solicitud->usuarioEstudiante->nombre}}</td>
                                            <td>{{$solicitud->legajo}}</td>
                                            <td>{{$solicitud->carrera->carrera}}</td>
                                            <td>{{$solicitud->carrera->unidad_academica->unidad_academica}}</td>
                                            <td><a href="{{route('solicitud.show',$solicitud->id_solicitud)}}">Ver Más</a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin Tabla Completas -->
            </div>
        </div>
    </div>
    {{-- Fin Tabla Solicitudes - Estudiante @endcan --}}


    {{-- Tabla Solicitudes - Dto Alumnos --}}
    <div id="nav-tabs-solicitud" class="container shadow-lg my-5 bg-light rounded">
        <!-- Solicitudes -->
        <div class="container px-md-5 px-3 py-5">
            <div class="row justify-content-end">
                <div class="col-6 text-start">
                    <h3>Solicitudes</h3>
                </div>
                <div class="col-6 text-end">
                    <span>(Dto Alumnos)</span>
                </div>
                <!-- Buscar Filtro -->
                <div class="col-12 mb-3 mt-2">
                    <form class="d-flex">
                        <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Nro solicitud" aria-label="Search">
                        <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Estado" aria-label="Search">
                        <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Fecha" aria-label="Search">
                        <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Legajo" aria-label="Search">
                        <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Asignado" aria-label="Search">
                        <button type="submit" class="btn btn-busqueda">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- NAV-TABS -->
            <div class="pt-2 justify-content-between d-flex align-items-center">
                <div class="nav nav-tabs col-12" id="v-tabs-tab" role="tablist">
                    <a class=" nav-link py-3 px-4 active" id="dtoalumnos-all-solicitudes-tab" data-bs-toggle="tab" href="#dtoalumnos-all-solicitudes" role="tab" aria-controls="dtoalumnos-all-solicitudes" aria-selected="true">Todas</a>
                    <a class="nav-link ms-2 py-3 px-4" id="dtoalumnos-mis-solicitudes-tab" data-bs-toggle="tab" href="#dtoalumnos-mis-solicitudes" role="tab" aria-controls="dtoalumnos-mis-solicitudes" aria-selected="false">Mis Solicitudes</a>
                </div>
            </div>
            <!-- Fin NAV-TABS -->
            <!-- Tabla Todas -->
            <div class="tab-content flex-grow-1 bg-white" id="v-tabs-tabContent">
                <div class="tab-pane fade show active" id="dtoalumnos-all-solicitudes" role="tabpanel" aria-labelledby="dtoalumnos-all-solicitudes-tab">
                    <div id="solicitud-usuario" class="row g-0">
                        <div class="col py-2 px-3">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nro Solicitud</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Legajo</th>
                                            <th scope="col">Asignado a</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($solicitudes as $solicitud)
                                        @if($solicitud->estados->last()->estado_descripcion->descripcion!='Terminado')
                                        <tr>
                                            <th scope="row">{{$solicitud->id_solicitud}}</th>
                                            <td>{{$solicitud->estados->last()->estado_descripcion->descripcion}}</td>
                                            <td>{{$solicitud->estados->last()->created_at}}</td>
                                            <td>{{$solicitud->legajo}}</td>
                                            @isset($solicitud->usuarioAdministrativo->apellido)
                                                <td>{{$solicitud->usuarioAdministrativo->apellido ?? ''}}, {{$solicitud->usuarioAdministrativo->nombre ?? ''}}</td>    
                                            @endisset
                                            @empty($solicitud->usuarioAdministrativo)
                                                <td><i>no asignada</i></td>
                                            @endempty
                                            <td><a href="{{route('solicitud.show',$solicitud->id_solicitud)}}">Ver Más</a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin Tabla Todas -->
                <!-- Tabla Mis Solicitudes -->
                <div class="tab-pane fade" id="dtoalumnos-mis-solicitudes" role="tabpanel" aria-labelledby="dtoalumnos-mis-solicitudes-tab">
                    <div id="solicitud-usuario" class="row g-0">
                        <div class="col py-2 px-3">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nro Solicitud</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Legajo</th>
                                            <th scope="col">Asignado a</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($solicitudes as $solicitud)
                                        @if($solicitud->estados->last()->estado_descripcion->descripcion=='Terminado')
                                        <tr>
                                            <th scope="row">{{$solicitud->id_solicitud}}</th>
                                            <td>{{$solicitud->estados->last()->estado_descripcion->descripcion}}</td>
                                            <td>{{$solicitud->estados->last()->created_at}}</td>
                                            <td>{{$solicitud->legajo}}</td>
                                            <td>{{$solicitud->usuarioAdministrativo->apellido}}, {{$solicitud->usuarioAdministrativo->nombre}}</td>
                                            <td><a href="{{route('solicitud.show',$solicitud->id_solicitud)}}">Ver Más</a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin Tabla Mis Solicitudes -->
            </div>
        </div>
    </div>
    {{-- Fin Tabla Solicitudes - Dto Alumnos --}}


    {{-- Tabla Solicitudes - Administración --}}
    {{--<div id="nav-tabs-solicitud" class="container shadow-lg my-5 bg-light rounded">
  <!-- Solicitudes -->
  <div class="container px-md-5 px-3 py-5">
    <div class="row justify-content-end">
      <div class="col-12">
        <h3>Solicitudes Procesadas</h3>
      </div>
      <!-- Buscar Filtro -->
      <div class="col-12 mb-3 mt-2">
        <form class="d-flex">
          <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Nro solicitud" aria-label="Search">
          <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Estado" aria-label="Search">
          <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Fecha" aria-label="Search">
          <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Legajo" aria-label="Search">
          <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Carrera" aria-label="Search">
          <button type="submit" class="btn btn-busqueda">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>
      <!-- Fin Buscar Filtro -->
    </div>
    <!-- Tabla Solicitudes Procesadas -->
    <div class="tab-content flex-grow-1 bg-white" id="v-tabs-tabContent">
      <div id="solicitud-usuario" class="row g-0">
        <div class="col py-2 px-3">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Nro Solicitud</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Legajo</th>
                  <th scope="col">Carrera</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($solicitudes as $solicitud)
                @if($solicitud->estados->last()->estado_descripcion->descripcion!='Terminado')
                <tr>
                  <!-- <th scope="row">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    </div>
                  </th> -->
                  <th scope="row">{{$solicitud->id_solicitud}}</th>
    <td>{{$solicitud->estados->last()->estado_descripcion->descripcion}}</td>
    <td>{{$solicitud->estados->last()->created_at}}</td>
    <td>{{$solicitud->legajo}}</td>
    <td>{{$solicitud->carrera->carrera}}</td>
    <td><a href="{{route('solicitud.show',$solicitud->id_solicitud)}}">Ver Más</a></td>
    </tr>
    @endif
    @endforeach
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    <!-- Fin Tabla Solicitudes Procesadas -->
    </div>
    </div>--}}
    {{-- Fin Tabla Solicitudes - Administración --}}


    {{-- Tabla Solicitudes - Santiago --}}
    <div id="nav-tabs-solicitud" class="container shadow-lg my-5 bg-light rounded">
        <!-- Solicitudes -->
        <div class="container px-md-5 px-3 py-5">
            <div class="row justify-content-center">
                <div class="col-6 text-start">
                    <h3>Solicitudes</h3>
                </div>
                <div class="col-6 text-end">
                    <span>(Santiago/Administración)</span>
                </div>
                <!-- Buscar Filtro -->
                <div class="col-12 mb-3 mt-2">
                    <form class="d-flex">
                        <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Nro solicitud" aria-label="Search">
                        <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Estado" aria-label="Search">
                        <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Fecha Inicio" aria-label="Search">
                        <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Fecha Modificación" aria-label="Search">
                        <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Solicitante" aria-label="Search">
                        <button type="submit" class="btn btn-busqueda">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                <!-- Fin Buscar Filtro -->
                <!-- NAV-TABS -->
                <div class="pt-2 justify-content-between d-flex align-items-center">
                    <div class="nav nav-tabs col-12" id="v-tabs-tab" role="tablist">
                        <a class=" nav-link py-3 px-4 active" id="santi-all-solicitudes-tab" data-bs-toggle="tab" href="#santi-all-solicitudes" role="tab" aria-controls="santi-all-solicitudes" aria-selected="true">Todas</a>
                        <a class="nav-link ms-2 py-3 px-4" id="santi-solicitudes-firmadas-tab" data-bs-toggle="tab" href="#santi-solicitudes-firmadas" role="tab" aria-controls="santi-solicitudes-firmadas" aria-selected="false">Firmadas</a>
                    </div>
                </div>
                <!-- Fin NAV-TABS -->
            </div>

            <!-- Tabla Todas -->
            <div class="tab-content flex-grow-1 bg-white" id="v-tabs-tabContent">
                <div class="tab-pane fade show active" id="santi-all-solicitudes" role="tabpanel" aria-labelledby="santi-all-solicitudes-tab">
                    <div id="solicitud-usuario" class="row g-0">
                        <div class="col py-2 px-3">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nro Solicitud</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Fecha Inicio</th>
                                            <th scope="col">Fecha Última Modificación</th>
                                            <th scope="col">Solicitante</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($solicitudes as $solicitud)
                                        @if($solicitud->estados->last()->estado_descripcion->descripcion!='Terminado')
                                        <tr>
                                            <th>{{$solicitud->id_solicitud}}</th>
                                            <td>{{$solicitud->estados->last()->estado_descripcion->descripcion}}</td>
                                            <td>{{$solicitud->estados->first()->created_at}}</td>
                                            <td>{{$solicitud->estados->last()->created_at}}</td>
                                            <td>{{$solicitud->usuarioEstudiante->apellido}}, {{$solicitud->usuarioEstudiante->nombre}}</td>
                                            <td><a href="{{route('solicitud.show',$solicitud->id_solicitud)}}">Ver Más</a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin Tabla Todas -->
                <!-- Tabla Firmadas -->
                <div class="tab-pane fade" id="santi-solicitudes-firmadas" role="tabpanel" aria-labelledby="santi-solicitudes-firmadas-tab">
                    <div id="solicitud-usuario" class="row g-0">
                        <div class="col py-2 px-3">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nro Solicitud</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Fecha Inicio</th>
                                            <th scope="col">Fecha Última Modificación</th>
                                            <th scope="col">Solicitante</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($solicitudes as $solicitud)
                                        @if($solicitud->estados->last()->estado_descripcion->descripcion=='Terminado')
                                        <tr>
                                            <th>{{$solicitud->id_solicitud}}</th>
                                            <td>{{$solicitud->estados->last()->estado_descripcion->descripcion}}</td>
                                            <td>{{$solicitud->estados->first()->created_at}}</td>
                                            <td>{{$solicitud->estados->last()->created_at}}</td>
                                            <td>{{$solicitud->usuarioEstudiante->apellido}}, {{$solicitud->usuarioEstudiante->nombre}}</td>
                                            <td><a href="{{route('solicitud.show',$solicitud->id_solicitud)}}">Ver Más</a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin Tabla Firmadas -->
            </div>
        </div>
    </div>
    {{-- Fin Tabla Solicitudes - Santiago --}}


    {{-- Tabla Solicitudes - Root --}}
    <div id="nav-tabs-solicitud" class="container shadow-lg my-5 bg-light rounded">
        <!-- Lista de Usuarios -->
        <div class="container px-md-5 px-3 py-5">
            <div class="row justify-content-center">
                <div class="col-6 text-start">
                    <h3>Lista de Usuarios</h3>
                </div>
                <div class="col-6 text-end">
                    <span>(Root)</span>
                </div>
                <!-- Botones Acciones -->
                <div class="row mb-3 mt-2 px-4">
                    <div class="col-12 col-md-3 py-2 d-grid gap-2">
                        <a href="{{route('solicitud.create')}}" class='btn botonFormulario'>Ver Más</a>
                    </div>
                    <div class="col-12 col-md-3 py-2 d-grid gap-2">
                        <a href="{{route('solicitud.create')}}" class='btn botonFormulario'>Crear</a>
                    </div>
                    <div class="col-12 col-md-3 py-2 d-grid gap-2">
                        <a href="{{route('solicitud.create')}}" class='btn botonFormulario'>Modificar</a>
                    </div>
                    <div class="col-12 col-md-3 py-2 d-grid gap-2">
                        <a href="{{route('solicitud.create')}}" class='btn botonFormulario'>Eliminar</a>
                    </div>
                </div>
                <!-- Fin Botones Acciones -->
                <!-- Buscar Filtro -->
                <div class="col-12 mb-3 mt-2">
                    <form class="d-flex">
                        <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Id Usuario" aria-label="Search">
                        <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Rol" aria-label="Search">
                        <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Estado" aria-label="Search">
                        <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Nombre" aria-label="Search">
                        <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Apellido" aria-label="Search">
                        <button type="submit" class="btn btn-busqueda">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- Fin Buscar Filtro -->
            <!-- Tabla Lista Usuarios -->
            <div class="tab-content flex-grow-1 bg-white" id="v-tabs-tabContent">
                <div id="solicitud-usuario" class="row g-0">
                    <div class="col py-2 px-3">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Id Usuario</th>
                                        <th scope="col">Rol</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($solicitudes as $solicitud)
                                    @if($solicitud->estados->last()->estado_descripcion->descripcion == 'Aguarda Firma Santiago')
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            </div>
                                        </th>
                                        <td scope="row">{{$solicitud->usuarioEstudiante->id_usuario}}</td>
                                        <td>{{$solicitud->Rol}}</td>
                                        <td>{{$solicitud->estados->last()->estado_descripcion->descripcion}}</td>
                                        <td>{{$solicitud->usuarioEstudiante->nombre}}</td>
                                        <td>{{$solicitud->usuarioEstudiante->apellido}}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Tabla Lista Usuarios -->
        </div>
    </div>
    {{-- Fin Tabla Solicitudes - Root --}}


    {{-- Tabla Solicitudes - Año --}}
    <div id="nav-tabs-solicitud" class="container shadow-lg my-5 bg-light rounded">
        <!-- Lista de Usuarios -->
        <div class="container px-md-5 px-3 py-5">
            <div class="row justify-content-center">
                <div class="col-6 text-start">
                    <h3>Programas</h3>
                </div>
                <!-- Boton agregar anio -->
                <div class="col-6 text-end pb-2">
                    <a href="{{route('anio.create')}}" class='btn btn-create'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                            </path>
                        </svg>
                    </a>
                </div>
                <!-- Fin Boton agregar anio -->
                <!-- Breadcrumb -->
                <div class="col-12 mt-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Años</li>
                        </ol>
                    </nav>
                </div>
                <!-- Fin Breadcrumb -->
            </div>
            {{-- <!-- Tabla Años --> MARCOS COMENTAMOS ESTO POR UN PULL QUE NO SABIAMOS QUÈ ELEGIR
            <div class="tab-content flex-grow-1 bg-white" id="v-tabs-tabContent">
                <div id="solicitud-usuario" class="row g-0">
                    <div class="col py-2 px-3">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Año</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($solicitudes as $solicitud)
                                        @if($solicitud->hoja_resumen_final != null)
                                            @if($solicitud->hoja_resumen_final->url_hoja_unida_final != null && $solicitud->estados->last()->estado_descripcion->descripcion == 'Aguarda Firma Santiago')
                                            <tr>
                                                <th scope="row">{{$solicitud->Anio}}</th>
                                                <td><a href="{{route('solicitud.show',$solicitud->idSolicitud)}}">Modificar</a></td>
                                            </tr>
                                            @endif
                                        @endif
                                    @if($solicitud->hoja_resumen_final != null)
                                    @if($solicitud->hoja_resumen_final->url_hoja_unida_final != null && $solicitud->UltimoEstado == 'Aguarda Firma Santiago')
                                    <tr>
                                        <th>{{$solicitud->idSolicitud}}</th>
                                        <td>{{$solicitud->UltimoEstado}}</td>
                                        <td>{{$solicitud->Fecha}}</td>
                                        <td>{{$solicitud->FechaUltimoEstado}}</td>
                                        <td>{{$solicitud->UsuarioEstudiante}}</td>
                                        <td><a href="{{route('solicitud.show',$solicitud->idSolicitud)}}">Ver Más</a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endif
                                    @endforeach
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>--}}
            <!-- Fin Tabla Lista Usuarios -->
        </div>
    </div>
    {{-- Fin Tabla Solicitudes - Año --}}

    {{-- Tabla Solicitudes - Carrera --}}
    <div id="nav-tabs-solicitud" class="container shadow-lg my-5 bg-light rounded">
        <!-- Lista de Usuarios -->
        <div class="container px-md-5 px-3 py-5">
            <div class="row justify-content-center">
                <div class="col-6 text-start">
                    <h3>Programas</h3>
                </div>
                <!-- Boton agregar carrera -->
                <div class="col-6 text-end pb-2">
                    <a href="{{route('carrera.create')}}" class='btn btn-create'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                            </path>
                        </svg>
                    </a>
                </div>
                <!-- Fin Boton agregar carrera -->
                <!-- Breadcrumb -->
                <div class="col-12 mt-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Años</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Carreras</li>
                        </ol>
                    </nav>
                </div>
                <!-- Fin Breadcrumb -->
            </div>
            <!-- Tabla Años -->
            <div class="tab-content flex-grow-1 bg-white" id="v-tabs-tabContent">
                <div id="solicitud-usuario" class="row g-0">
                    <div class="col py-2 px-3">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Carrera</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($solicitudes as $solicitud)
                                    @if($solicitud->estados->last()->estado_descripcion->descripcion!='Terminado')
                                    <tr>
                                        <th scope="row">{{$solicitud->carrera->carrera}}</th>
                                        <td><a href="{{route('solicitud.show',$solicitud->id_solicitud)}}">Modificar</a></td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Tabla Lista Usuarios -->
        </div>
    </div>
    {{-- Fin Tabla Solicitudes - Carrera --}}

    {{-- Tabla Solicitudes - Programa --}}
    <div id="nav-tabs-solicitud" class="container shadow-lg my-5 bg-light rounded">
        <!-- Lista de Usuarios -->
        <div class="container px-md-5 px-3 py-5">
            <div class="row justify-content-center">
                <div class="col-6 text-start">
                    <h3>Programas</h3>
                </div>
                <!-- Boton agregar carrera -->
                <div class="col-6 text-end pb-2">
                    <a href="{{route('carrera.create')}}" class='btn btn-create'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                            </path>
                        </svg>
                    </a>
                </div>
                <!-- Fin Boton agregar carrera -->
                <!-- Breadcrumb -->
                <div class="col-12 mt-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Años</a></li>
                            <li class="breadcrumb-item"><a href="#">Carreras</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Programas</li>
                        </ol>
                    </nav>
                </div>
                <!-- Fin Breadcrumb -->
            </div>
            <!-- Tabla Años -->
            <div class="tab-content flex-grow-1 bg-white" id="v-tabs-tabContent">
                <div id="solicitud-usuario" class="row g-0">
                    <div class="col py-2 px-3">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Año</th>
                                        <th scope="col">Carrera</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($solicitudes as $solicitud)
                                        @if($solicitud->estados->last()->estado_descripcion->descripcion!='Terminado')
                                            <tr>
                                                <th scope="row">{{$solicitud->Anio}}</th>
                                                <th>{{$solicitud->carrera->carrera}}</th>
                                                <td><a href="{{route('solicitud.show',$solicitud->id_solicitud)}}">Modificar</a></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Tabla Lista Usuarios -->
        </div>
    </div>
    {{-- Fin Tabla Solicitudes - Programa --}}
</main>

@endsection
