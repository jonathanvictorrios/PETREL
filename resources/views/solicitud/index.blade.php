@extends('estructura/layout')

@section('cuerpo')
@php($titulo = 'Listado solicitudes - Petrel')@endphp

@include('estructura/header')


{{-- Tabla Solicitudes - Estudiante --}}
<div id="nav-solicitud" class="container shadow-lg my-5 bg-light rounded">

    @if (session('mensaje') ) {{-- Mensaje final luego de submit --}}
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center m-3 p-3">
        <i class='fas fa-check-circle mx-2'></i>{{ session('mensaje') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
  <!-- Solicitudes -->
  <div class="container px-md-5 px-3 py-5">
    <h3>Mis solicitudes</h3>
    <div class="pt-2 justify-content-between d-flex align-items-center">
      <!-- NAV-TABS -->
      <div class="nav nav-tabs col-9" id="v-tabs-tab" role="tablist">
        <a class=" nav-link py-3 px-4 active" id="v-tabs-actuales-tab" data-bs-toggle="tab" href="#v-tabs-actuales" role="tab" aria-controls="v-tabs-actuales" aria-selected="true">Actuales</a>
        <a class="nav-link ms-2 py-3 px-4" id="v-tabs-completas-tab" data-bs-toggle="tab" href="#v-tabs-completas" role="tab" aria-controls="v-tabs-completas" aria-selected="false">Completadas</a>
      </div>
      <!-- Fin NAV-TABS -->
      <!-- Boton agregar solicitud -->
      <div class="col-3 text-end">
        <a href="{{route('solicitud.create')}}" class='btn btn-create'>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
          </svg>
        </a>
      </div>
      <!-- Fin Boton agregar solicitud -->
    </div>
    <!-- Tabla Actuales -->
    <div class="tab-content flex-grow-1 bg-white" id="v-tabs-tabContent">
      <div class="tab-pane fade show active" id="v-tabs-actuales" role="tabpanel" aria-labelledby="v-tabs-actuales-tab">
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
      <!-- Fin Tabla Completas -->
    </div>
  </div>
</div>
{{-- Fin Tabla Solicitudes - Estudiante --}}


{{-- Tabla Solicitudes - Dto Alumnos --}}
<div id="nav-solicitud" class="container shadow-lg my-5 bg-light rounded">
  <!-- Solicitudes -->
  <div class="container px-md-5 px-3 py-5">
    <div class="row justify-content-end">
      <div class="col-12">
        <h3>Solicitudes</h3>
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
      <div class="nav nav-tabs col-9" id="v-tabs-tab" role="tablist">
        <a class=" nav-link py-3 px-4 active" id="dtoalumnos-all-solicitudes-tab" data-bs-toggle="tab" href="#dtoalumnos-all-solicitudes" role="tab" aria-controls="dtoalumnos-all-solicitudes" aria-selected="true">Todas</a>
        <a class="nav-link ms-2 py-3 px-4" id="dtoalumnos-mis-solicitudes-tab" data-bs-toggle="tab" href="#dtoalumnos-mis-solicitudes" role="tab" aria-controls="dtoalumnos-mis-solicitudes" aria-selected="false">Mis Solicitudes</a>
      </div>
    </div>
    <!-- Fin NAV-TABS -->
    <!-- Tabla Todas -->
    <div class="tab-content flex-grow-1 bg-white" id="v-tabs-tabContent">
      <div class="tab-pane fade show active" id="dtoalumnos-all-solicitudes" role="tabpanel" aria-labelledby="dtoalumnos-all-solicitudes-tab">
        <div id="solicitud-usuario" class="row g-0">
          <div class="col p-4">
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
                  @if($solicitud->UltimoEstado!='Terminado')
                  <tr>
                    <th scope="row">{{$solicitud->idSolicitud}}</th>
                    <td>{{$solicitud->Estado}}</td>
                    <td>{{$solicitud->Fecha}}</td>
                    <td>{{$solicitud->Legajo}}</td>
                    <td>{{$solicitud->Asignado}}</td>
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
      <!-- Fin Tabla Todas -->
      <!-- Tabla Mis Solicitudes -->
      <div class="tab-pane fade" id="dtoalumnos-mis-solicitudes" role="tabpanel" aria-labelledby="dtoalumnos-mis-solicitudes-tab">
        <div id="solicitud-usuario" class="row g-0">
          <div class="col p-4">
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
                  @if($solicitud->UltimoEstado=='Terminado')
                  <tr>
                    <th scope="row">{{$solicitud->idSolicitud}}</th>
                    <td>{{$solicitud->Estado}}</td>
                    <td>{{$solicitud->Fecha}}</td>
                    <td>{{$solicitud->Legajo}}</td>
                    <td>{{$solicitud->Asignado}}</td>
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
      <!-- Fin Tabla Mis Solicitudes -->
    </div>
  </div>
</div>
{{-- Fin Tabla Solicitudes - Dto Alumnos --}}


{{-- Tabla Solicitudes - Administración --}}
<div id="nav-solicitud" class="container shadow-lg my-5 bg-light rounded">
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
        <div class="col p-4">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Nro Solicitud</th>
                  <th scope="col">Estado Actual</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Legajo</th>
                  <th scope="col">Carrera</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($solicitudes as $solicitud)
                @if($solicitud->UltimoEstado!='Terminado')
                <tr>
                  <th scope="row">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    </div>
                  </th>
                  <th scope="row">{{$solicitud->idSolicitud}}</th>
                  <td>{{$solicitud->Estado}}</td>
                  <td>{{$solicitud->Fecha}}</td>
                  <td>{{$solicitud->Legajo}}</td>
                  <td>{{$solicitud->Carrera}}</td>
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
    <!-- Fin Tabla Solicitudes Procesadas -->
  </div>
</div>
{{-- Fin Tabla Solicitudes - Administración --}}


{{-- Tabla Solicitudes - Santiago --}}
<div id="nav-solicitud" class="container shadow-lg my-5 bg-light rounded">
  <!-- Solicitudes -->
  <div class="container px-md-5 px-3 py-5">
    <div class="row justify-content-center">
      <div class="col-12">
        <h3>Solicitudes</h3>
      </div>
      <!-- Botones Acciones -->
      <div class="row mb-3 mt-2 px-4">
        <div class="col-12 col-md-4 py-2 d-grid gap-2">
          <a href="{{route('solicitud.create')}}" class='btn botonFormulario'>Ver Más</a>
        </div>
        <div class="col-12 col-md-4 py-2 d-grid gap-2">
          <a href="{{route('solicitud.create')}}" class='btn botonFormulario'>Modificar</a>
        </div>
        <div class="col-12 col-md-4 py-2 d-grid gap-2">
          <a href="{{route('solicitud.create')}}" class='btn botonFormulario'>Enviar</a>
        </div>
      </div>
      <!-- Fin Botones Acciones -->
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
    </div>
    <!-- Fin Buscar Filtro -->
    <!-- NAV-TABS -->
    <div class="pt-2 justify-content-between d-flex align-items-center">
      <div class="nav nav-tabs col-9" id="v-tabs-tab" role="tablist">
        <a class=" nav-link py-3 px-4 active" id="santi-all-solicitudes-tab" data-bs-toggle="tab" href="#santi-all-solicitudes" role="tab" aria-controls="santi-all-solicitudes" aria-selected="true">Todas</a>
        <a class="nav-link ms-2 py-3 px-4" id="santi-solicitudes-firmadas-tab" data-bs-toggle="tab" href="#santi-solicitudes-firmadas" role="tab" aria-controls="santi-solicitudes-firmadas" aria-selected="false">Firmadas</a>
      </div>
    </div>
    <!-- Fin NAV-TABS -->
    <!-- Tabla Todas -->
    <div class="tab-content flex-grow-1 bg-white" id="v-tabs-tabContent">
      <div class="tab-pane fade show active" id="santi-all-solicitudes" role="tabpanel" aria-labelledby="santi-all-solicitudes-tab">
        <div id="solicitud-usuario" class="row g-0">
          <div class="col p-4">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nro Solicitud</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Última Modificación</th>
                    <th scope="col">Solicitante</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($solicitudes as $solicitud)
                  @if($solicitud->UltimoEstado!='Terminado')
                  <tr>
                    <th scope="row">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                      </div>
                    </th>
                    <th>{{$solicitud->idSolicitud}}</th>
                    <td>{{$solicitud->Estado}}</td>
                    <td>{{$solicitud->FechaIni}}</td>
                    <td>{{$solicitud->FechaUltimaMod}}</td>
                    <td>{{$solicitud->UsuarioEstudiante}}</td>
                    {{--<td><a href="{{route('solicitud.asignar',[$solicitud->idSolicitud,2])}}">Asignar</a></td>--}} {{--El parametro 2 corresponde al idUsuarioAdministrativo que este logueado--}}
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
          <div class="col p-4">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nro Solicitud</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Última Modificación</th>
                    <th scope="col">Solicitante</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($solicitudes as $solicitud)
                  @if($solicitud->UltimoEstado=='Terminado')
                  <tr>
                    <th scope="row">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                      </div>
                    </th>
                    <th>{{$solicitud->idSolicitud}}</th>
                    <td>{{$solicitud->Estado}}</td>
                    <td>{{$solicitud->FechaIni}}</td>
                    <td>{{$solicitud->FechaUltimaMod}}</td>
                    <td>{{$solicitud->UsuarioEstudiante}}</td>
                    {{--<td><a href="{{route('solicitud.asignar',[$solicitud->idSolicitud,2])}}">Asignar</a></td>--}} {{--El parametro 2 corresponde al idUsuarioAdministrativo que este logueado--}}
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
<div id="nav-solicitud" class="container shadow-lg my-5 bg-light rounded">
  <!-- Lista de Usuarios -->
  <div class="container px-md-5 px-3 py-5">
    <div class="row justify-content-center">
      <div class="col-12">
        <h3>Lista Usuarios</h3>
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
          <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Solicitante" aria-label="Search">
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
        <div class="col p-4">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Id Usuario</th>
                  <th scope="col">Rol</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Solicitante</th>
                </tr>
              </thead>
              <tbody>
                @foreach($solicitudes as $solicitud)
                @if($solicitud->UltimoEstado!='Terminado')
                <tr>
                  <th scope="row">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    </div>
                  </th>
                  <th scope="row">{{$solicitud->idUsuario}}</th>
                  <td>{{$solicitud->Rol}}</td>
                  <td>{{$solicitud->Estado}}</td>
                  <td>{{$solicitud->UsuarioEstudiante}}</td>
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


@endsection
