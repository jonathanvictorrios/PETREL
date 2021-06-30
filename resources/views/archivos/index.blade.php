@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Petrel')

@include('estructura/header')
{{-- Tabla Solicitudes - Santiago --}}
<div id="nav-solicitud" class="container shadow-lg my-5 bg-light rounded">
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
                    <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Nro solicitud"
                        aria-label="Search">
                    <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Estado"
                        aria-label="Search">
                    <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Fecha Inicio"
                        aria-label="Search">
                    <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Fecha Modificación"
                        aria-label="Search">
                    <input class="form-control me-1 me-lg-2 pe-0" type="search" placeholder="Solicitante"
                        aria-label="Search">
                    <button type="submit" class="btn btn-busqueda">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <!-- Fin Buscar Filtro -->
            <!-- NAV-TABS -->
            <div class="pt-2 justify-content-between d-flex align-items-center">
                <div class="nav nav-tabs col-9" id="v-tabs-tab" role="tablist">
                    <a class=" nav-link py-3 px-4 active" id="santi-all-solicitudes-tab" data-bs-toggle="tab"
                        href="#santi-all-solicitudes" role="tab" aria-controls="santi-all-solicitudes"
                        aria-selected="true">Todas</a>
                    <a class="nav-link ms-2 py-3 px-4" id="santi-solicitudes-firmadas-tab" data-bs-toggle="tab"
                        href="#santi-solicitudes-firmadas" role="tab" aria-controls="santi-solicitudes-firmadas"
                        aria-selected="false">Firmadas</a>
                </div>
            </div>
            <!-- Fin NAV-TABS -->
        </div>

        <!-- Tabla Todas -->
        <div class="tab-content flex-grow-1 bg-white" id="v-tabs-tabContent">
            <div class="tab-pane fade show active" id="santi-all-solicitudes" role="tabpanel"
                aria-labelledby="santi-all-solicitudes-tab">
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
                                    @forelse ($solicitudes as $solicitud)
                                    @if($solicitud->estados->last()->estado_descripcion->id_estado_descripcion == 5)
                                    <tr>
                                        <th>{{$solicitud->id_solicitud}}</th>
                                        <td>{{$solicitud->estados->last()->estado_descripcion->descripcion}}</td>
                                        <td>{{ date_format( $solicitud->created_at,"d/m/Y H:i:s") }}</td>
                                        <td>{{ date_format( $solicitud->updated_at,"d/m/Y H:i:s") }}</td>
                                        <td>{{$solicitud->usuarioEstudiante->nombre.' '.$solicitud->usuarioEstudiante->apellido}}
                                        </td>
                                        {{-- <td><a href="{{route ('solicitud.show',$solicitud->id_solicitud)}}">Ver Más</a> --}}
                                        </td>
                                        <td><a class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modalComentar">
                                                Ver mas
                                            </a>
                                        </td>
                                        <div class="modal fade" id="modalComentar" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('archivos.cargarComentario',0) }}" method="get"
                                                    id="formComentario">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detalle de
                                                                solicitud</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-12">Estudiante:
                                                                    {{$solicitud->usuarioEstudiante->nombre.' '.$solicitud->usuarioEstudiante->apellido}}
                                                                </div>
                                                                <div class="col-12">
                                                                    Administrativo:
                                                                    {{$solicitud->usuarioAdministrativo->nombre.' '.$solicitud->usuarioAdministrativo->apellido}}
                                                                </div>
                                                                <div class="col-12">
                                                                    Carrera:
                                                                    {{$solicitud->carrera->carrera}}
                                                                </div>
                                                                <div class="col-12">
                                                                    Legajo:
                                                                    {{$solicitud->legajo}}
                                                                </div>
                                                                <div class="col-12">
                                                                    Universidad:
                                                                    {{$solicitud->universidad_destino}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col"><a class="btn btn-primary"
                                                                    href="{{ route('archivos.downloadSinFirma',$solicitud->id_solicitud) }}">Descargar
                                                                    documento sin firmar</a>
                                                            </div>
                                                            <div class="col"><a class="btn btn-primary"
                                                                    href="{{ route('archivos.downloadFirmado',$solicitud->id_solicitud) }}">Descargar
                                                                    documento firmado</a>
                                                            </div>
                                                            <div class="col"><a class="btn btn-primary"
                                                                    href="{{ route('archivos.create', 'dato='.$solicitud->id_solicitud) }}">Adjuntar
                                                                    firmado</a>
                                                            </div>
                                                            <!-- <div class="col"><a class="btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalComentar" id="href-comentar">
                                                                    Devolver a Dpto. Alumnos
                                                                </a></div> -->
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </tr>
                                    @endif
                                    @empty
                                    <tr>
                                        <td>No hay solicitudes</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if (session('mensaje') )
                            <div
                                class="alert alert-success alert-dismissible fade show d-flex align-items-center m-3 p-3">
                                <i class='fas fa-check-circle mx-2'></i>{{ session('mensaje') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Tabla Todas -->
            <!-- Tabla Firmadas -->
            <div class="tab-pane fade" id="santi-solicitudes-firmadas" role="tabpanel"
                aria-labelledby="santi-solicitudes-firmadas-tab">
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
                                    @forelse ($solicitudes as $solicitud)
                                    @if($solicitud->hojaResumen->hoja_resumen_final->url_hoja_unida_final != null)
                                    <tr>
                                        <th>{{$solicitud->id_solicitud}}</th>
                                        <td>{{$solicitud->estados->last()->estado_descripcion->descripcion}}</td>
                                        <td>{{ date_format( $solicitud->created_at,"d/m/Y H:i:s") }}</td>
                                        <td>{{ date_format( $solicitud->updated_at,"d/m/Y H:i:s") }}</td>
                                        <td>{{$solicitud->usuarioEstudiante->nombre.' '.$solicitud->usuarioEstudiante->apellido}}
                                        </td>
                                        <td><a>Ver Más</a>
                                        </td>
                                    </tr>
                                    @endif
                                    @empty
                                    <tr>
                                        <td>No hay solicitudes</td>
                                    </tr>
                                    @endforelse
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
@endsection
